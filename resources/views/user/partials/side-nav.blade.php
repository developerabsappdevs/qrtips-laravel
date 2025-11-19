 <div class="sidebar bg_img" data-background="{{ asset('public/frontend/images/banner/esim-embraded-bg.webp') }}">
    <div class="sidebar-inner">
        <div class="sidebar-area">
            <div class="sidebar-logo">
                <a href="index.html" class="sidebar-main-logo">
                    <img src="{{ get_logo($basic_settings)}}" alt="logo">
                </a>
                <button class="sidebar-menu-bar">
                    <i class="fas fa-exchange-alt"></i>
                </button>
            </div>
            <div class="sidebar-menu-wrapper">
                <ul class="sidebar-menu">
                    <li class="sidebar-menu-item active">
                        <a href="{{ setRoute('user.dashboard') }}">
                            <i class="menu-icon las la-palette"></i>
                            <span class="menu-title">{{ __("Dashboard") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="my-qrcode.html">
                            <i class="menu-icon fa-solid fa-qrcode"></i>
                            <span class="menu-title">{{ __("My QR") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="withdraw.html">
                            <i class="menu-icon las la-cloud-upload-alt"></i>
                            <span class="menu-title">{{ __("Withdraw") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="transaction-logs.html">
                            <i class="menu-icon las la-receipt"></i>
                            <span class="menu-title">{{ __("Transaction Logs") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="{{ setRoute('user.security.google.2fa') }}">
                            <i class="menu-icon las la-qrcode"></i>
                            <span class="menu-title">{{ __("2FA Security") }}</span>
                        </a>
                    </li>
                    <li class="sidebar-menu-item">
                        <a href="javascript:void(0)" class="logout-btn">
                            <i class="menu-icon las la-sign-out-alt"></i>
                            <span class="menu-title">{{ __("Logout") }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="sidebar-doc-box bg_img" data-background="{{ asset('public/frontend/images/element/support-bg.webp') }}">
            <div class="sidebar-doc-icon">
                <i class="fas fa-question-circle"></i>
            </div>
            <div class="sidebar-doc-content">
                <h5 class="title">{{ __("Need Help?") }}</h5>
                <p>{{ __("Please check our docs") }}</p>
                <div class="sidebar-doc-btn">
                    <a href="{{ setRoute('user.support.ticket.index') }}" class="btn--base w-100">{{ __("Get Support") }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(".logout-btn").click(function(){
            var actionRoute =  "{{ setRoute('user.logout') }}";
            var target      = 1;
            var message     = `Are you sure to <strong>Logout</strong>?`;

            openAlertModal(actionRoute,target,message,"Logout","POST");
        });
    </script>
@endpush