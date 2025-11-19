@extends('frontend.layouts.master')
@push('css')
    <style>
        .account-section .account-wrapper .account-form input {
            border: 1px solid #3e7c70 !important;
        }
        .otp-form{
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .otp {
            display: inline-block;
            width: 58px;
            height: 50px;
            text-align: center;
            padding: 0;
            margin: 3px;
            border-radius: 5px;
        }
    </style>
@endpush
@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<!-- Password Recovery - OTP Verification -->
<div class="account-section ptb-80">
    <div class="account-area">
        <div class="account-form-area">
            <h5 class="title">{{ __("Two Factor Authorization") }}</h5>
            <p>{{ __("Please enter your authorization code to access dashboard") }}</p>
            <form class="account-form" id="otpForm" action="{{ setRoute('user.authorize.google.2fa.submit') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-12 form-group text-center">
                        <div class="otp-container">
                            <input type="text" name="code[]" class="otp" maxlength="1" required>
                            <input type="text" name="code[]" class="otp" maxlength="1" required>
                            <input type="text" name="code[]" class="otp" maxlength="1" required>
                            <input type="text" name="code[]" class="otp" maxlength="1" required>
                            <input type="text" name="code[]" class="otp" maxlength="1" required>
                            <input type="text" name="code[]" class="otp" maxlength="1" required>
                        </div>
                    </div>
                    <div class="col-lg-12 form-group text-center">
                        <button type="submit" class="btn--base w-90">{{ __("Authorize") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Account
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection
@push('script')
@endpush
