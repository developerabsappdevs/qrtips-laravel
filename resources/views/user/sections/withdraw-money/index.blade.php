@extends('user.layouts.master') 
@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Withdraw Funds")])
@endsection 
@section('content')
<div class="withdraw-section">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="withdraw-header text-center mb-3">
                <h2 class="withdraw-title">{{ __("Withdraw Funds") }}</h2>
                <p class="withdraw-subtitle">{{ __("Transfer your balance to your preferred payment method") }}</p>
            </div>
        </div>
    </div>
    
    <!-- Wallet Balance & Exchange Rate -->
    <div class="row justify-content-center mb-4">
        <div class="col-xl-8 col-lg-10">
            <div class="wallet-info-card">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="info-item">
                            <span class="info-label">{{ __("Available Balance") }}:</span>
                            <span class="info-value walletBalanceShow">--</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-item">
                            <span class="info-label">{{ __("Current Exchange Rate") }}:</span>
                            <span class="info-value rate-show">--</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <!-- Withdraw Form Section -->
        <div class="col-xl-6 col-lg-6 col-md-12 mb-4 mb-lg-0">
            <div class="withdraw-card">
                <div class="card-header">
                    <h4 class="card-title">{{ __("Withdraw Process") }}</h4>
                </div>
                <div class="card-body">
                    <form class="card-form" action="{{ setRoute("user.withdraw.money.submit") }}" method="POST">
                        @csrf
                        <!-- Amount Input -->
                        <div class="form-group mb-4">
                            <label for="withdrawAmount">{{ __("Enter Amount") }} <span>*</span></label>
                            <div class="input-group amount-input-group">
                                <input 
                                    type="number" 
                                    class="form--control"
                                    name="amount"
                                    id="withdrawAmount"
                                    placeholder="0.00"
                                    required
                                >
                                <div class="input-group-append">
                                    <select class="nice-select" name="request_currency">
                                        @foreach ($user_wallets ?? [] as $item)
                                        <option
                                        value="{{ $item->currency->code }}"
                                        data-id="{{ $item->currency->id }}"
                                        data-rate="{{ $item->currency->rate }}"
                                        data-symbol="{{ $item->currency->symbol }}"
                                        data-type="{{ $item->currency->type }}"
                                        data-balance="{{ $item->balance }}"
                                        {{ get_default_currency_code() == $item->currency->code ? "selected": "" }}
                                        >{{ $item->currency->code }}</option> 
                                        @endforeach 
                                    </select>
                                </div>
                            </div>
                            <div class="form-text">
                                <code class="d-block limit-show">--</code>
                                <code class="d-block fees-show">--</code>
                            </div>
                        </div>

                        <!-- Receiving Gateway -->
                        <div class="form-group mb-4">
                            <label for="gatewaySelect">{{ __("Receiving Gateway") }} <span>*</span></label>
                            <select class="form--control nice-select" name="gateway_currency"> 
                                @foreach ($payment_gateways ?? [] as $gateway)
                                    @foreach ($gateway->currencies ?? [] as $item) 
                                    <option 
                                    value="{{ $item->alias  }}"
                                    data-currency="{{ $item->currency_code }}"
                                    data-min_amount="{{ $item->min_limit }}"
                                    data-max_amount="{{ $item->max_limit }}"
                                    data-percent_charge="{{ $item->percent_charge }}"
                                    data-fixed_charge="{{ $item->fixed_charge }}"
                                    data-rate="{{ $item->rate }}"
                                    value="1">
                                        {{ $item->name }}
                                        </option>
                                    @endforeach
                                @endforeach 
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-group mt-4 text-center">
                            <button type="submit" class="btn--base withdraw--btn">
                                {{ __("Proceed to Withdraw") }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Preview Section -->
        <div class="col-xl-6 col-lg-6 col-md-12">
            <div class="preview-card">
                <div class="card-header">
                    <h4 class="card-title">{{ __("Withdrawal Preview") }}</h4>
                </div>
                <div class="card-body">
                    <div class="preview-content">
                        <!-- Preview Item 1 -->
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-money-bill-wave"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Withdrawal Amount") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value request-amount">--</span>
                            </div>
                        </div>

                        <!-- Preview Item 2 -->
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-money-check-alt"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Conversion Amount") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value conversion-amount">--</span>
                            </div>
                        </div>

                        <!-- Preview Item 3 -->
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
                                <span class="info-value fees">--</span>
                            </div>
                        </div>
                        <!-- Preview Item 4 -->
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-wallet"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Receiving Amount") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value will-get">--</span>
                            </div>
                        </div>
                        <!-- Preview Item 5 -->
                        <div class="preview-item">
                            <div class="preview-left">
                                <div class="preview-icon">
                                    <i class="las la-money-check-alt"></i>
                                </div>
                                <div class="preview-info">
                                    <h5 class="info-title">{{ __("Total Payable Amount") }}</h5>
                                </div>
                            </div>
                            <div class="preview-value">
                                <span class="info-value pay-in-total">--</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="preview-note">
                        <div class="note-icon">
                            <i class="las la-info-circle"></i>
                        </div>
                        <div class="note-content">
                            <p class="note-text">{{ __("Your withdrawal will be processed within 24 hours. Additional verification may be required for large amounts.") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script> 

   $('select[name=gateway_currency]').on('change',function(){
       getExchangeRate($(this));
       getLimit();
       getFees();
       getPreview();
   });
   $(document).ready(function(){
       getExchangeRate();
       getLimit();
       getFees();  
       walletBalance();
   });
   $('select[name=request_currency]').on('change',function(){  
       getExchangeRate();
       getLimit();
       getFees();
       getPreview(); 
       walletBalance();
   });
   $("input[name=amount]").keyup(function(){
        getFees();
        getPreview();
   }); 
   function walletBalance(){ 
    $('.walletBalanceShow').html($("select[name=request_currency] :selected").attr("data-symbol") + parseFloat($("select[name=request_currency] :selected").attr("data-balance")).toFixed(2));
   }
   // calculate exchange rate 
   function getExchangeRate(event) {
       var element = event;
       var gatewayCode = acceptVar().gatewayCode;
       var gatewayRate = acceptVar().gatewayRate;
       var gatewayMinAmount = acceptVar().gatewayMinAmount;
       var gatewayMaxAmount = acceptVar().gatewayMaxAmount; 
       var senderRate = acceptVar().senderRate; 

       var exchangeRate = (1/senderRate)*gatewayRate; 

       $('.rate-show').html("1 " + acceptVar().senderCurrencyCode + " = " + parseFloat(exchangeRate).toFixed(3) + " " + gatewayCode);
   }
   //minimum and maxmimum money limite
   function getLimit() {
       var gateway_currency_code = acceptVar().gatewayCode;
       var gateway_currency_rate = acceptVar().gatewayRate;
       var senderRate = acceptVar().senderRate; 
       var min_limit = acceptVar().gatewayMinAmount;
       var max_limit =acceptVar().gatewayMaxAmount;
       
       var exchangeRate = (1/senderRate)*gateway_currency_rate;

       if($.isNumeric(min_limit) || $.isNumeric(max_limit)) {
           var min_limit_calc = parseFloat(min_limit/exchangeRate).toFixed(2); 
           var max_limit_clac = parseFloat(max_limit/exchangeRate).toFixed(2);
           $('.limit-show').html("Limit: " + min_limit_calc + " " + acceptVar().senderCurrencyCode + " - " + max_limit_clac + " " + acceptVar().senderCurrencyCode);
           return {
               minLimit:min_limit_calc,
               maxLimit:max_limit_clac,
           };
       }else {
           $('.limit-show').html("--");
           return {
               minLimit:0,
               maxLimit:0,
           };
       }
   }

   // get variables 
   function acceptVar() {
       var senderCurrencyCode = $("select[name=request_currency] :selected").val();
       var senderRate = $("select[name=request_currency] :selected").attr("data-rate"); 
       var senderCurrencyType = $("select[name=request_currency] :selected").attr("data-type"); 

       var selectedVal = $("select[name=gateway_currency] :selected");
       var gatewayCode = $("select[name=gateway_currency] :selected").attr("data-currency");
       var gatewayRate = $("select[name=gateway_currency] :selected").attr("data-rate");
       var gatewayMinAmount = $("select[name=gateway_currency] :selected").attr("data-min_amount");
       var gatewayMaxAmount = $("select[name=gateway_currency] :selected").attr("data-max_amount");
       var gatewayFixedCharge = $("select[name=gateway_currency] :selected").attr("data-fixed_charge");
       var gatewayPercentCharge = $("select[name=gateway_currency] :selected").attr("data-percent_charge");

       if (senderCurrencyType == "CRYPTO") {
        var senderCurrencyDigit = 8;
       } else {
        var senderCurrencyDigit = 2;
       }

       return {
            gatewayCode:gatewayCode,
            gatewayRate:gatewayRate,
            gatewayMinAmount:gatewayMinAmount,
            gatewayMaxAmount:gatewayMaxAmount,
            gatewayFixedCharge:gatewayFixedCharge,
            gatewayPercentCharge:gatewayPercentCharge,
            selectedVal:selectedVal,

            senderCurrencyCode:senderCurrencyCode,
            senderRate:senderRate,
            senderCurrencyDigit:senderCurrencyDigit,

       };
   }

   function feesCalculation() {
       var gateway_currency_code = acceptVar().gatewayCode;
       var gateway_currency_rate = acceptVar().gatewayRate;
       var sender_amount = $("input[name=amount]").val();
       var senderRate = acceptVar().senderRate; 

       sender_amount == "" ? (sender_amount = 0) : (sender_amount = sender_amount);

       var exchangeRate = (1/senderRate)*gateway_currency_rate; 

       var fixed_charge = acceptVar().gatewayFixedCharge;
       var percent_charge = acceptVar().gatewayPercentCharge;
       if ($.isNumeric(percent_charge) && $.isNumeric(fixed_charge) && $.isNumeric(sender_amount)) {
           // Process Calculation
           var fixed_charge_calc = parseFloat(fixed_charge);
           var percent_charge_calc = (parseFloat(sender_amount) * parseFloat(exchangeRate)) * (parseFloat(percent_charge) / 100);
           var total_charge = parseFloat(fixed_charge_calc) + parseFloat(percent_charge_calc);
           total_charge = parseFloat(total_charge).toFixed(acceptVar().senderCurrencyDigit);
           // return total_charge;
           return {
               total: total_charge,
               fixed: fixed_charge_calc,
               percent: percent_charge,
           };
       } else {
           // return "--";
           return false;
       }
   }

   function getFees() {
       var gateway_currency_code = acceptVar().gatewayCode;
       var percent = acceptVar().gatewayPercentCharge;
       var charges = feesCalculation();
       if (charges == false) {
           return false;
       }
       $(".fees-show").html("Charge: " + parseFloat(charges.fixed).toFixed(acceptVar().senderCurrencyDigit) + " " + gateway_currency_code + " + " + parseFloat(charges.percent).toFixed(acceptVar().senderCurrencyDigit) + "%");
   }
   function getPreview() {
           var senderAmount = $("input[name=amount]").val();
           var gateway_currency_code = acceptVar().gatewayCode;
           var gateway_currency_rate = acceptVar().gatewayRate;
           var charges = feesCalculation();
           
            var gatewayRate = acceptVar().gatewayRate;
           var senderRate = acceptVar().senderRate; 
           var exchangeRate = (1/senderRate)*gatewayRate; 
            
           senderAmount == "" ? senderAmount = 0 : senderAmount = senderAmount;

           // Sending Amount
           $('.request-amount').text(parseFloat(senderAmount).toFixed(acceptVar().senderCurrencyDigit) + " " + acceptVar().senderCurrencyCode);

           // conversion-amount
           var totalPay = parseFloat(senderAmount) * parseFloat(exchangeRate)
           $('.conversion-amount').text(parseFloat(totalPay).toFixed(acceptVar().senderCurrencyDigit) + " " + gateway_currency_code);

           // Fees
           $('.fees').text(charges.total + " " + gateway_currency_code);

           // will get amount
           var willGet = parseFloat(totalPay).toFixed(acceptVar().senderCurrencyDigit) - parseFloat(charges.total).toFixed(acceptVar().senderCurrencyDigit);
           $('.will-get').text(parseFloat(willGet).toFixed(2) + " " + gateway_currency_code);

           // Pay In Total 
           totalAmount = parseFloat(senderAmount).toFixed(acceptVar().senderCurrencyDigit);
           $('.pay-in-total').text(parseFloat(totalAmount).toFixed(acceptVar().senderCurrencyDigit) + " " + acceptVar().senderCurrencyCode);

    } 
</script>
<script>
    // Get the input element
    var amountInput = document.getElementById('amountInput');

    // Add event listener for input event
    amountInput.addEventListener('input', function() {
        // Get the input value
        var inputValue = amountInput.value;

        // Remove any non-numeric characters except decimal point from the input value
        var numericValue = inputValue.replace(/[^0-9.]/g, '');

        // Update the input field value with the cleaned numeric value
        amountInput.value = numericValue;
    });
</script>
@endpush