<!DOCTYPE html>
<html lang="{{ get_default_language_code() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ (isset($page_title) ? __($page_title) : __("Dashboard")) }}</title>
     <!-- signika fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Signika:wght@300..700&display=swap" rel="stylesheet">
    <!-- sans sarif fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    @include('partials.header-asset')
    
    @stack("css")
</head>
<body>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Body Overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div id="body-overlay" class="body-overlay"></div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Body Overlay
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="page-wrapper">
    @include('user.partials.side-nav')
    <div class="main-wrapper">
        <div class="main-body-wrapper">
            @include('user.partials.top-nav')
            <div class="body-wrapper">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Dashboard
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


@include('partials.footer-asset')
{{-- @include('admin.partials.notify') --}}
@include('user.partials.push-notification')

@stack("script")

<!-- Script for Usage Chart  -->
<script>
    var options = {
        series: [{
            name: 'Tips Received',
            color: "#0ea9ae",
            data: [320, 420, 380, 550, 480, 520, 450, 580, 620, 750, 680, 820]
        }],
        chart: {
            height: 350,
            toolbar: {
                show: false
            },
            type: 'bar',
        },
        plotOptions: {
            bar: {
                borderRadius: 10,
                dataLabels: {
                    position: 'top',
                },
            }
        },
        dataLabels: {
            enabled: true,
            formatter: function (val) {
                return "$" + val;
            },
            offsetY: -20,
            style: {
                fontSize: '12px',
                colors: ["#0e7774"]
            }
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            position: 'top',
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false
            },
            crosshairs: {
                fill: {
                    type: 'gradient',
                    gradient: {
                        colorFrom: '#0ea9ae',
                        colorTo: '#0ea9ae',
                        stops: [0, 100],
                        opacityFrom: 0.4,
                        opacityTo: 0.5,
                    }
                }
            },
            tooltip: {
                enabled: true,
            }
        },
        yaxis: {
            axisBorder: {
                show: false
            },
            axisTicks: {
                show: false,
            },
            labels: {
                show: false,
                formatter: function (val) {
                    return "$" + val;
                }
            }
        },
        title: {
            text: 'Monthly Tips Received',
            floating: true,
            offsetY: 330,
            align: 'center',
            style: {
                color: '#222222'
            }
        }
    };
    
    var chart = new ApexCharts(document.querySelector("#chart1"), options);
    chart.render();
</script>

</body>
</html>