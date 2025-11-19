@extends('user.layouts.master')

@push('css')
    
@endpush

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("Profile")])
@endsection

@section('content')
<div class="row mb-20-none">
    <div class="col-xl-6 col-lg-6 mb-20">
        <div class="custom-card mt-10">
            <div class="dashboard-header-wrapper">
                <h4 class="title">{{ __("Profile Settings") }}</h4>
                <div class="dashboard-btn-wrapper">
                    <div class="dashboard-btn">
                        <button type="button" class="btn--base" data-bs-toggle="modal" data-bs-target="#deleteModal">{{ __("Delete Profile") }}</button>
                    </div>
                </div>
            </div>
            <div class="card-body profile-body-wrapper">
                <form class="card-form" method="POST" action="{{ setRoute('user.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="profile-settings-wrapper">
                        <div class="profile-thumb-content">
                            <div class="profile-thumb">
                                <div class="avatar-preview">
                                    <div class="profilePicPreview bg_img" data-background="{{ auth()->user()->userImage }}"></div>
                                </div>
                                <div class="avatar-edit">
                                    <input type='file' class="profilePicUpload" name="image" id="profilePicUpload2" accept=".png, .jpg, .jpeg, .webp, .svg" />
                                    <label for="profilePicUpload2"><i class="las la-camera"></i></label>
                                </div>
                            </div>
                            <div class="profile-content">
                                <h6 class="username">{{ auth()->user()->username }}</h6>
                                <ul class="user-info-list mt-md-2">
                                    <li><i class="las la-envelope"></i>{{ auth()->user()->email }}</li>
                                    <li><i class="las la-user-circle"></i>{{ auth()->user()->phone }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="profile-form-area">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => "First Name<span>*</span>",
                                    'name'          => "firstname",
                                    'placeholder'   => "Enter First Name...",
                                    'value'         => old('firstname',auth()->user()->firstname)
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => "Last Name<span>*</span>",
                                    'name'          => "lastname",
                                    'placeholder'   => "Enter Last Name...",
                                    'value'         => old('lastname',auth()->user()->lastname)
                                ])
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __("Email Address") }}<span>*</span></label>
                                <input type="email" class="form--control" placeholder="{{ __("Enter Email...") }}" value="{{ old('email',auth()->user()->email) }}" readonly>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __("Phone Number") }}<span>*</span></label>
                                <div class="input-group">
                                    <div class="input-group-text phone-code">+{{ auth()->user()->mobile_code }}</div>
                                    <input class="phone-code" type="hidden" name="phone_code" value="{{ auth()->user()->mobile_code }}" />
                                    <input type="text" class="form--control" placeholder="Enter Phone ..." name="phone" value="{{ old('phone',auth()->user()->mobile) }}">
                                </div>
                                @error("phone")
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                <label>{{ __("Country") }}<span>*</span></label>
                                <select name="country" class="form--control select2-auto-tokenize country-select" data-placeholder="Select Country" data-old="{{ old('country',auth()->user()->address->country ?? "") }}"></select>
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @php
                                    $old_city = old('city',auth()->user()->address->city ?? "");
                                @endphp
                                <label>{{ __("City") }}</label>
                                <input type="text" class="form--control" placeholder="{{ __("Enter City...") }}" name="city" value="{{ $old_city }}">
                            </div>
                            <div class="col-xl-12 col-lg-12 form-group">
                                <label>{{ __("Address") }}<span>*</span></label>
                                <input type="text" class="form--control" placeholder="{{ __("Enter Full Address...") }}" name="address" value="{{ old('address',auth()->user()->address->address ?? "") }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @php
                                    $old_state = old('state',auth()->user()->address->state ?? "");
                                @endphp
                                <label>{{ __("State") }}</label>
                                <input type="text" class="form--control" placeholder="{{ __("Enter State...") }}" name="state" value="{{ $old_state }}">
                            </div>
                            <div class="col-xl-6 col-lg-6 form-group">
                                @include('admin.components.form.input',[
                                    'label'         => "Zip Code",
                                    'name'          => "zip_code",
                                    'placeholder'   => "Enter Zip...",
                                    'value'         => old('zip_code',auth()->user()->address->zip ?? "")
                                ])
                            </div>
                            <div class="col-xl-4 col-lg-4 form-group">
                                <label>{{ __("Date of Birth") }}</label>
                                <input type="date" class="form--control" value="1990-01-15">
                            </div>
                        </div>
                        <div class="row mt-30">
                            <div class="col-xl-12 col-lg-12">
                                <button type="submit" class="btn--base w-100">{{ __("Update Profile") }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 mb-20">
        <div class="custom-card mt-10">
            <div class="dashboard-header-wrapper">
                <h4 class="title">{{ __("Change Password") }}</h4>
            </div>
            <div class="card-body">
                <form class="card-form" action="{{ setRoute('user.profile.password.update') }}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 form-group show_hide_password">
                            <label>{{ __("Current Password") }}<span>*</span></label>
                            <input type="password" class="form--control" name="current_password" placeholder="Enter Password...">
                            <a href="javascript:void(0)" class="show-pass field-icon"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>

                        <div class="col-xl-12 col-lg-12 form-group show_hide_password-2">
                            <label>{{ __("New Password") }}<span>*</span></label>
                            <input type="password" class="form--control" name="password" placeholder="Enter Password...">
                            <a href="javascript:void(0)" class="show-pass field-icon"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-xl-12 col-lg-12 form-group show_hide_password-3">
                            <label>{{ __("Confirm Password") }}<span>*</span></label>
                            <input type="password" class="form--control" name="password_confirmation" placeholder="Enter Password...">
                            <a href="javascript:void(0)" class="show-pass field-icon"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12">
                        <button type="submit" class="btn--base w-100">{{ __("Change") }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" id="deleteModalLabel">
                <h5 class="modal-title">{{ __("Are you sure to delete your account?") }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __("If you do not think you will use “damascards” again and like your account deleted, we can take card of this for you. Keep in mind you will not be able to reactivate your account or retrieve any of the content or information you have added. If you would still like your account deleted, click “Delete Account”.") }}</p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn--base" data-bs-dismiss="modal" aria-label="Close">{{ __("Cancel") }}</button>
                <form action="{{ route('user.delete.account') }}" method="POST">
                @csrf
                <button type="submit" class="btn--base">{{ __("Delete Account") }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Modal
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection

@push('script')
    <script>
        getAllCountries("{{ setRoute('global.countries') }}");
        $(document).ready(function(){
            $("select[name=country]").change(function(){
                var phoneCode = $("select[name=country] :selected").attr("data-mobile-code");
                placePhoneCode(phoneCode);
            });

            countrySelect(".country-select",$(".country-select").siblings(".select2"));
            stateSelect(".state-select",$(".state-select").siblings(".select2"));
        });
    </script>
@endpush