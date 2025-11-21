@extends('user.layouts.master')

@push('css')
    
@endpush

@section('breadcrumb')
    @include('user.components.breadcrumb',['breadcrumbs' => [
        [
            'name'  => __("Dashboard"),
            'url'   => setRoute("user.dashboard"),
        ]
    ], 'active' => __("QR Code Generator")])
@endsection

@section('content')
<div class="dashboard-area">
    <div class="row justify-content-center">
        <div class="col-xl-8 col-lg-10">
            <div class="my-qrcode-container">
                <!-- Header Section -->
                <div class="my-qrcode-container__header">
                    <i class="header-icon fas fa-qrcode"></i>
                    <h2 class="header-title">{{ __("QR Code Generator") }}</h2>
                </div>

                <!-- Navigation Tabs -->
                <nav class="my-qrcode-container__nav">
                    <button class="nav-item active" data-tab="qr">
                        <i class="fas fa-qrcode"></i> {{ __("QR Code") }}
                    </button>
                    <button class="nav-item" data-tab="link">
                        <i class="fas fa-link"></i> {{ __("Share Link") }}
                    </button>
                </nav>
                <!-- Content Area -->
                <div class="my-qrcode-container__content">
                        <div class="qr-content" data-content="qr">
                            <div class="qr-content__image">
                                <img src="{{ $qr_image }}" alt="{{ __("QR Code") }}">
                            </div>
                            <p class="qr-content__caption">{{ __("Scan this QR code to access your dashboard") }}</p>
                        </div>

                        <!-- Link Tab Content -->
                        <div class="link-content hidden" data-content="link">
                            <div class="link-content__form">
                                    <div class="link-content__field">
                                    <label class="link-content__label" for="shareableLink">
                                        <i class="fas fa-link"></i> {{ __("Shareable Link") }}
                                    </label>
                                    <div class="link-content__input-group">
                                        <input 
                                            type="text" 
                                            id="shareableLink" 
                                            class="link-content__input" 
                                            name="share_link"
                                            value="{{ $share_link }}"
                                            placeholder="{{ $share_link }}"
                                            readonly
                                        >
                                        <button type="button" class="link-content__copy-btn" id="copyLinkBtn" onclick="copyShareLink()">
                                            <i class="fas fa-copy"></i> {{ __("Copy") }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- Footer with Social Sharing -->
                <div class="my-qrcode-container__footer">
                    <div class="social-share">
                        <span class="social-share__title">{{ __("Share via") }}:</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ $share_link }}" class="social-share__item" data-platform="facebook" aria-label="{{ __("Share on Facebook") }}" target="_blank">
                            <i class="social-icon fab fa-facebook-f"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ $share_link }}" class="social-share__item" data-platform="twitter" aria-label="{{ __("Share on Twitter") }}" target="_blank">
                            <i class="social-icon fab fa-twitter"></i>
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $share_link }}" class="social-share__item" data-platform="linkedin" aria-label="{{ __("Share on LinkedIn") }}" target="_blank">
                            <i class="social-icon fab fa-linkedin-in"></i>
                        </a>
                        <a href="https://wa.me/?text={{ $share_link }}" class="social-share__item" data-platform="whatsapp" aria-label="{{ __("Share on WhatsApp") }}" target="_blank">
                            <i class="social-icon fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
 <script>
    function copyShareLink() {
        const text = document.querySelector("#shareableLink").value.trim();
        copyToClipboard(text, 'Share Link Copied!');
    }
    // Copy functions
    function copyToClipboard(text, message = 'Copied to clipboard!') {
        navigator.clipboard.writeText(text).then(() => {
            showCopyNotification(message);
        }).catch(() => {
            // Fallback for older browsers
            const textArea = document.createElement('textarea');
            textArea.value = text;
            document.body.appendChild(textArea);
            textArea.select();
            document.execCommand('copy');
            document.body.removeChild(textArea);
            showCopyNotification(message);
        });
    }
    function showCopyNotification(message) {
        const notification = document.getElementById('copyNotification');
        notification.textContent = message;
        notification.classList.add('show');

        setTimeout(() => {
            notification.classList.remove('show');
        }, 2000);
    }
</script>
@endpush