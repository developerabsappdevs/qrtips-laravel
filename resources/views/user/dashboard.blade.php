@extends('user.layouts.master')

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Dashboard")])
@endsection

@section('content')
<div class="dashboard-area">
    <div class="dashboard-item-area mt-50-none">
        <div class="row justify-content-center">
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">Total Balance</span>
                        <h3 class="title">$1,250.00</h3>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">QR Scans Today</span>
                        <h3 class="title">47</h3>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">Total Transactions</span>
                        <h3 class="title">156</h3>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-hand-holding-usd"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">Tips Received</span>
                        <h3 class="title">$325 <span>Today</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">Total Tips Received</span>
                        <h3 class="title">156 <span>This Month</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">Average Tip Amount</span>
                        <h3 class="title">$8.50 <span>Per Tip</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-dollar"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">Scanned vs Paid</span>
                        <h3 class="title">78% <span>Conversion</span></h3>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 mb-20">
                <div class="dashbord-item">
                    <div class="dashboard-icon">
                        <i class="fas fa-calendar-day"></i>
                    </div>
                    <div class="dashboard-content">
                        <span class="sub-title">Best Day for Tips</span>
                        <h3 class="title">Saturday <span>$145 Avg</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="chart-area mt-30">
    <div class="row mb-20-none">
        <div class="col-xl-12 mb-20">
            <div class="dashboard-header-wrapper">
                <h4 class="title">Usage Chart</h4>
            </div>
            <div class="chart-wrapper">
                <div class="chart-container">
                    <div id="chart1" class="chart"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="table-area mt-30">
    <h4 class="title">Transactions Log</h4>
    <div class="table-wrapper mt-20">
        <div class="table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>TRX</th>
                        <th>Name</th>
                        <th>Paid By</th>
                        <th>Amount</th>
                        <th>Date & Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ADT2022092201</td>
                        <td><span>John Smith</span></td>
                        <td><span>PayPal</span></td>
                        <td>$12.50</td>
                        <td>2022-05-30 03:46 PM</td>
                        <td><span class="badge badge--success">Complete</span></td>
                        <td>
                            <button class="btn btn--action">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#ADT2022092202</td>
                        <td><span>Sarah Johnson</span></td>
                        <td><span>Stripe Card</span></td>
                        <td>$8.75</td>
                        <td>2023-01-13 06:50 AM</td>
                        <td><span class="badge badge--warning">Incomplete</span></td>
                        <td>
                            <button class="btn btn--action">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#ADT2022092203</td>
                        <td><span>Mike Davis</span></td>
                        <td><span>Visa Card</span></td>
                        <td>$14.20</td>
                        <td>2024-02-26 07:37 PM</td>
                        <td><span class="badge badge--success">Complete</span></td>
                        <td>
                            <button class="btn btn--action">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#ADT2022092204</td>
                        <td><span>Emily Wilson</span></td>
                        <td><span>Visa Card</span></td>
                        <td>$9.99</td>
                        <td>2024-02-28 10:15 AM</td>
                        <td><span class="badge badge--success">Complete</span></td>
                        <td>
                            <button class="btn btn--action">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>#ADT2022092205</td>
                        <td><span>David Brown</span></td>
                        <td><span>Mastercard</span></td>
                        <td>$11.45</td>
                        <td>2024-03-10 02:30 PM</td>
                        <td><span class="badge badge--success">Complete</span></td>
                        <td>
                            <button class="btn btn--action">
                                <i class="fa-solid fa-bars-staggered"></i>
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="view-all-btn text-center mt-3">
        <a href="transaction-logs.html" class="btn--base">View All
            <svg id="fi_2989981" viewBox="0 0 6.3499999 6.3500002" xmlns="http://www.w3.org/2000/svg" xmlns:svg="http://www.w3.org/2000/svg"><g id="layer1" transform="translate(0 -290.65)"><path id="path9413" d="m.53383012 294.09009h4.64777838l-.8707478.87075c-.250114.25011.1250569.62528.375171.37517l.7930187-.79426.529381-.53021c.1025988-.10321.1025988-.26989 0-.3731l-1.3223997-1.32395c-.050312-.0517-.1195649-.0807-.1917197-.0801-.2381777.00003-.3550648.29011-.1834513.45527l.8728149.87075h-4.66353979c-.36681596.0182-.33942735.54794.0136943.52968z" font-variant-ligatures="normal" font-variant-position="normal" font-variant-caps="normal" font-variant-numeric="normal" font-variant-alternates="normal" font-feature-settings="normal" text-indent="0" text-align="start" text-decoration-line="none" text-decoration-style="solid" text-decoration-color="rgb(0,0,0)" text-transform="none" text-orientation="mixed" white-space="normal" shape-padding="0" isolation="auto" mix-blend-mode="normal" solid-color="rgb(0,0,0)" solid-opacity="1" vector-effect="none"></path></g></svg>
        </a>
    </div>
</div>
@endsection