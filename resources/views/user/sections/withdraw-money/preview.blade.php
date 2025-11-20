@extends('user.layouts.master') 
@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Money Out")])
@endsection 
@push('css')
    <style>
        .form--control {
            background-color: #ffffff;
            border: 1px solid #e5e5e5;
            -webkit-box-shadow: none;
                    box-shadow: none;
            border-radius: 5px;
            height: auto;
            font-weight: 500;
            font-size: 13px;
            color: #222222;
            padding: 10px 25px;
            width: 100%;
        }
    </style>
@endpush
@section('content')   
<div class="withdraw-section">
    <div class="row mt-20 mb-20-none justify-content-center">
        <div class="col-xl-7 col-lg-7 mb-20">
            <div class="custom-card mt-10">
                <div class="dashboard-header-wrapper">
                    <h4 class="title">{{__(@$page_title)}}</h4>
                </div>
                <div class="card-body">
                    <form class="card-form" action="{{ setRoute("user.withdraw.money.confirm") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row"> 
                            <div class="title mb-4">
                                @php
                                    echo @$gateway->desc;
                                @endphp
                            </div>
                            @foreach ($gateway->input_fields as $item)

                            @if ($item->type == "select")
                                <div class="col-lg-12 form-group">
                                    <label for="{{ $item->name }}">{{ $item->label }}
                                        @if($item->required == true)
                                        <span class="text-danger">*</span>
                                        @else
                                        <span class="">( Optional )</span>
                                        @endif
                                    </label>
                                    <select name="{{ $item->name }}" id="{{ $item->name }}" class="form--control nice-select">
                                        <option selected disabled>Choose One</option>
                                        @foreach ($item->validation->options as $innerItem)
                                            <option value="{{ $innerItem }}">{{ $innerItem }}</option>
                                        @endforeach
                                    </select>
                                    @error($item->name)
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            @elseif ($item->type == "file")
                                <div class="col-lg-12 form-group">
                                    <label for="{{ $item->name }}">{{ $item->label }}
                                        @if($item->required == true)
                                        <span class="text-danger">*</span>
                                        @else
                                        <span class="">( Optional )</span>
                                        @endif
                                    </label>
                                    <input type="{{ $item->type }}" class="form--control"  name="{{ $item->name }}" value="{{ old($item->name) }}">
                                </div>
                            @elseif ($item->type == "text")
                                <div class="col-lg-12 form-group">
                                    <label for="{{ $item->name }}">{{ $item->label }}
                                        @if($item->required == true)
                                        <span class="text-danger">*</span>
                                        @else
                                        <span class="">( Optional )</span>
                                        @endif
                                    </label>
                                    <input type="{{ $item->type }}" class="form--control" placeholder="{{ ucwords(str_replace('_',' ', $item->name)) }}" name="{{ $item->name }}" value="{{ old($item->name) }}">
                                </div>
                            @elseif ($item->type == "textarea")
                                <div class="col-lg-12 form-group">
                                    @include('admin.components.form.textarea',[
                                        'label'     => $item->label,
                                        'name'      => $item->name,
                                        'value'     => old($item->name),
                                    ])
                                </div>
                            @endif
                        @endforeach
                            <div class="col-xl-12 col-lg-12">
                                <button type="submit" class="btn--base w-100 btn-loading"> {{ __("Confirm") }}

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-5 col-lg-5 mb-20">
            <div class="preview-card">
                <div class="card-header">
                    <h4 class="card-title">{{_("Withdraw Information")}}</h4>
                </div>
                <div class="card-body">
                    <div class="preview-content">
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-receipt"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Entered Amount") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value request-amount">{{ number_format(@$moneyOutData->amount,$digitShow )}} {{ $moneyOutData->request_currency }}</span>
                            </div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-exchange-alt"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Exchange Rate") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value">{{ __("1") }} {{ $moneyOutData->request_currency }} =  {{ number_format(@$moneyOutData->exchange_rate,$digitShow )}} {{ @$moneyOutData->gateway_currency }}</span>
                            </div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="lab la-get-pocket"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Conversion Amount") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value">{{ number_format(@$moneyOutData->conversion_amount,$digitShow )}} {{ @$moneyOutData->gateway_currency }}</span>
                            </div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-battery-half"></i>
                                </div>
                                <div class="preview-info">
                                        <h5 class="info-title">{{ __("Total Fees & Charges") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value">{{ number_format(@$moneyOutData->gateway_charge,$digitShow )}} {{ @$moneyOutData->gateway_currency }}</span>
                            </div>
                        </div>

                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-money-check-alt"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Receiving Amount") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value text--success">{{ number_format(@$moneyOutData->will_get,$digitShow )}} {{ @$moneyOutData->gateway_currency }}</span>
                            </div>
                        </div>
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-money-check-alt"></i>
                                </div>
                                <div class="preview-info">
                                        <h5 class="info-title">{{ __("Total Payable") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value text--warning last">{{ number_format(@$moneyOutData->payable,$digitShow )}} {{ @$moneyOutData->request_currency }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection

@push('script')

@endpush
