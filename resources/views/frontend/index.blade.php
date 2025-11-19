@extends('frontend.layouts.master')

@push("css")
    
@endpush

@section('content') 
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<section class="banner-section" id="home">
    <div class="banner-overlay"></div>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="banner-content">
                    <h1 class="banner-title">
                        Instant QR Payments <span>Made Simple</span>
                    </h1>
                    <p class="banner-description">
                        Scan, Pay, Done! Send and receive instant tips and payments through QR codes. No more cash hassles - just quick, secure transactions anywhere, anytime.
                    </p>
                    <div class="banner-actions">
                        <a href="#" class=" btn--base">
                            Get Started Now
                        </a>
                        <div class="video-button-wrapper">
                            <a class="video-button" data-rel="lightcase:myCollection" href="https://www.youtube.com/embed/7p6hG3plQj4">
                                <span class="play-icon"></span>
                            </a>
                            <span class="video-label">Watch Demo</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                <div class="banner-image-wrapper">
                    <img src="{{ asset('public/frontend/images/banner/Gemini_Generated_Image_dzy4zjdzy4zjdzy4.webp') }}" alt="QR Tip Instant Payments" class="banner-image">
                </div>
            </div>
        </div>
    </div>
</section>

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Banner
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Service section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="service-section ptb-100" id="services">
    <div class="container">
        <div class="section-heading" data-aos="fade-up" data-aos-duration="1400">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="section-heading__content text-center">
                        <!-- New subtitle section with icon -->
                        <div class="section-subtitle">
                            <div class="subtitle-icon">
                                <i class="fa-solid fa-qrcode"></i>
                                <div class="scan-line"></div>
                            </div>
                            <span class="subtitle">Instant Digital Payments</span>
                        </div>
                    
                        <h2 class="title">Fast & Secure <span class="title-strong">Money Transfers</span></h2>
                        <p class="description">Send and receive payments instantly with our secure platform. Give instant tips to performers, pay freelancers in seconds, split bills with friends, and conduct business transactions - all with bank-grade security and real-time processing.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center" data-aos="fade-up" data-aos-duration="1400">
            <!-- Service Item 1 -->
            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="provided-service-item">
                    <div class="service-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="service-item-title">Instant Tip Payments</h3>
                    <p class="service-description">
                        Send tips instantly to service providers, performers, or anyone with just a few taps. No delays, no complications.
                    </p>
                </div>
            </div>
            
            <!-- Service Item 2 -->
            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="provided-service-item">
                    <div class="service-icon">
                        <i class="fas fa-exchange-alt"></i>
                    </div>
                    <h3 class="service-item-title">Real-Time Transactions</h3>
                    <p class="service-description">
                        Experience true instant money transfers. Send and receive payments in seconds, not minutes or hours.
                    </p>
                </div>
            </div>
            
            <!-- Service Item 3 -->
            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="provided-service-item">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="service-item-title">Bank-Grade Security</h3>
                    <p class="service-description">
                        Your transactions are protected with enterprise-level encryption and security protocols. Your money stays safe.
                    </p>
                </div>
            </div>
            
            <!-- Service Item 4 -->
            <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-4">
                <div class="provided-service-item">
                    <div class="service-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="service-item-title">24/7 Customer Support</h3>
                    <p class="service-description">
                        Round-the-clock support to help with transactions, account issues, and any payment-related questions.
                    </p>
                </div>
            </div>

            <!-- Service Item 5 -->
            <div class="col-xl-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="provided-service-item">
                    <div class="service-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="service-item-title">Split Bills Instantly</h3>
                    <p class="service-description">
                        Easily split expenses with friends, family, or colleagues. Send payment requests and collect money instantly.
                    </p>
                </div>
            </div>
            
            <!-- Service Item 6 -->
            <div class="col-xl-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="provided-service-item">
                    <div class="service-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <h3 class="service-item-title">QR Code Payments</h3>
                    <p class="service-description">
                        Simple scan-and-pay functionality. Generate QR codes for receiving payments or scan to pay others instantly.
                    </p>
                </div>
            </div>

            <!-- Service Item 7 -->
            <div class="col-xl-4 col-md-4 col-sm-6 col-12 mb-4">
                <div class="provided-service-item">
                    <div class="service-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="service-item-title">Global Payment Support</h3>
                    <p class="service-description">
                        Send and receive payments across borders with competitive exchange rates and minimal transfer fees.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Service section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start world wide identity 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="identity-section ptb-80" id="aboutUs">
    <div class="container">
        <div class="row justify-content-center align-items-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30" data-aos="fade-left" data-aos-duration="1400">
                <div class="identity-image-wrapper">
                    <img src="{{ asset('public/frontend/images/element/connecting-world.webp') }}" alt="Qrtip - Instant Payment Platform" class="img-fluid identity-image">
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30" data-aos="fade-up" data-aos-duration="1400">
                <div class="section-heading" data-aos="fade-up" data-aos-duration="1400">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="section-heading__content ">
                                <!-- New subtitle section with icon -->
                                <div class="section-subtitle">
                                    <div class="subtitle-icon">
                                        <i class="fa-solid fa-qrcode"></i>
                                        <div class="scan-line"></div>
                                    </div>
                                    <span class="subtitle">World Wide Identity</span>
                                </div>
                            
                                <h2 class="title">Fast & Secure Solution For <span class="title-strong">Money Transfers</span></h2>
                                <p class="description">Send and receive payments instantly with our secure platform. Give instant tips to performers, pay freelancers in seconds, split bills with friends, and conduct business transactions - all with bank-grade security and real-time processing.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statistics -->
                <div class="stats-wrapper">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="row mb-30-none justify-content-center">
                                <div class="col-xl-7 col-md-6 col-sm-6">
                                    <div class="stats-item active">
                                        <div class="stats-content">
                                            <div class="counter-area">
                                                <h3 class="counter-number odometer" data-odometer-final="2.5">0</h3>
                                                <h3 class="counter-suffix">M+</h3>
                                            </div>
                                            <p>Instant Tips Sent</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6 col-sm-6">
                                    <div class="stats-item">
                                        <div class="stats-content">
                                            <div class="counter-area">
                                                <h3 class="counter-number odometer" data-odometer-final="98">0</h3>
                                                <h3 class="counter-suffix">%</h3>
                                            </div>
                                            <p>Transaction Success</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-md-6 col-sm-6">
                                    <div class="stats-item">
                                        <div class="stats-content">
                                            <div class="counter-area">
                                                <h3 class="counter-number odometer" data-odometer-final="50">0</h3>
                                                <h3 class="counter-suffix">+</h3>
                                            </div>
                                            <p>Payment Methods</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-7 col-md-6 col-sm-6">
                                    <div class="stats-item">
                                        <div class="stats-content">
                                            <div class="counter-area">
                                                <h3 class="counter-number odometer" data-odometer-final="1.7">0</h3>
                                                <h3 class="counter-suffix">sec</h3>
                                            </div>
                                            <p>Average Transfer Time</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End  identity
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Choose Us 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="why-choose-us ptb-80" id="chooseUs">
    <div class="container">
        <div class="section-heading" data-aos="fade-up" data-aos-duration="1400">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="section-heading__content text-center">
                        <!-- New subtitle section with icon -->
                        <div class="section-subtitle">
                            <div class="subtitle-icon">
                                <i class="fa-solid fa-qrcode"></i>
                                <div class="scan-line"></div>
                            </div>
                            <span class="subtitle">Why Choose Qrtip</span>
                        </div>
                    
                        <h2 class="title"> Fastest Way <span class="title-strong">Send & Recieving Tips </span></h2>
                        <p class="description">Join millions who trust Qrtip for instant payments. Tip performers in real-time, pay freelancers instantly, split bills with friends, and make secure business transactions - all with lightning speed and military-grade security.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Item 1 - Coffee Shop -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" 
                        style="background-image: url({{ asset('public/frontend/images/choose-us/coffeeshop.webp') }});" 
                        data-aos="fade-up" data-aos-duration="1400" data-aos-delay="100">
                    <figcaption class="choose-title">
                        <a href="#">
                            <strong>Cafe & Restaurant Tips</strong>
                        </a>
                    </figcaption>
                </div>
            </div>
            
            <!-- Item 2 - Donate -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" 
                        style="background-image: url({{ asset('public/frontend/images/choose-us/donate.webp') }});" 
                        data-aos="fade-up" data-aos-duration="1400" data-aos-delay="200">
                    <figcaption class="choose-title">
                        <strong>Event & Performance Tips</strong>
                    </figcaption>
                </div>
            </div>
            
            <!-- Item 3 - Home Service -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" style="background-image: url({{ asset('public/frontend/images/choose-us/home-service.webp') }});" data-aos="fade-up" data-aos-duration="1400" data-aos-delay="300">
                    <figcaption class="choose-title">
                        <a href="#">
                            <strong>Home Service Payments</strong>
                        </a>
                    </figcaption>
                </div>
            </div>
            
            <!-- Item 4 - Street Shop Coffee -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" 
                        style="background-image: url({{ asset('public/frontend/images/choose-us/street-shop-coffee.webp') }});" 
                        data-aos="fade-up" data-aos-duration="1400" data-aos-delay="400">
                    <figcaption class="choose-title">
                        <strong>Street Vendor Tips</strong>
                    </figcaption>
                </div>
            </div>

            <!-- Item 5 - Restaurant -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" 
                        style="background-image: url({{ asset('public/frontend/images/choose-us/resturant.webp') }});" 
                        data-aos="fade-up" data-aos-duration="1400" data-aos-delay="500">
                    <figcaption class="choose-title">
                        <a href="#">
                            <strong>Quick Bill Splitting</strong>
                        </a>
                    </figcaption>
                </div>
            </div>
            
            <!-- Item 6 - Happy Transactions -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" 
                        style="background-image: url({{ asset('public/frontend/images/choose-us/happy-transactions.webp') }});" 
                        data-aos="fade-up" data-aos-duration="1400" data-aos-delay="600">
                    <figcaption class="choose-title">
                        <strong>Ride/Drive Tips</strong>
                    </figcaption>
                </div>
            </div>
            
            <!-- Item 7 - Home Service -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" 
                        style="background-image: url({{ asset('public/frontend/images/choose-us/home-service.webp') }});" 
                        data-aos="fade-up" data-aos-duration="1400" data-aos-delay="700">
                    <figcaption class="choose-title">
                        <a href="#">
                            <strong>Freelancer Payments</strong>
                        </a>
                    </figcaption>
                </div>
            </div>
            
            <!-- Item 8 - Global Transactions -->
            <div class="col-md-6 col-lg-3">
                <div class="choose-item" 
                        style="background-image: url({{ asset('public/frontend/images/choose-us/global-transactions.webp') }});"
                        data-aos="fade-up" data-aos-duration="1400" data-aos-delay="800">
                    <figcaption class="choose-title">
                        <strong>Digital Content Tips</strong>
                    </figcaption>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End  Choose us 
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->



<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start how it works section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="how-it-works-section ptb-100">
    <div class="container">
        <div class="section-heading" data-aos="fade-up" data-aos-duration="1400">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="section-heading__content text-center">
                        <div class="section-subtitle">
                            <div class="subtitle-icon">
                                <i class="fa-solid fa-qrcode"></i>
                                <div class="scan-line"></div>
                            </div>
                            <span class="subtitle">How QRTip Works</span>
                        </div>
                    
                        <h2 class="title">Send Money in <span class="title-strong">3 Simple Steps</span></h2>
                        <p class="description">Experience the easiest way to send instant payments. Whether you're tipping performers, paying freelancers, or splitting bills with friends - Qrtip makes secure money transfers effortless and instant.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Process Navigation -->
        <div class="process-nav-wrapper" data-aos="fade-up" data-aos-duration="1400">
            <div class="process-nav">
                <div class="process-step active" data-step="1">
                    <div class="step-connector"></div>
                    <div class="step-icon">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div class="step-title">Scan QR</div>
                </div>
                
                <div class="process-step" data-step="2">
                    <div class="step-connector"></div>
                    <div class="step-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="step-title">Enter Amount</div>
                </div>
                
                <div class="process-step" data-step="3">
                    <div class="step-connector"></div>
                    <div class="step-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <div class="step-title">Instant Transfer</div>
                </div>
            </div>
        </div>

        <!-- Content Area -->
        <div class="process-content-wrapper" >
            <div class="row align-items-center">
                <!-- Left Side - Content -->
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="process-content" data-aos="fade-right" data-aos-duration="1400">
                        <!-- Step 1 Content -->
                        <div class="content-item active" data-step="1">
                            <h3 class="content-title">Scan QR Code to Select Recipient</h3>
                            <p class="content-description">
                                Simply scan the recipient's QR code to automatically select them. No need to search for names or numbers - instant recipient selection with one quick scan. Our technology ensures accurate and secure recipient identification every time.
                            </p>
                            <ul class="content-features">
                                <li><i class="fas fa-check"></i> Instant recipient identification</li>
                                <li><i class="fas fa-check"></i> No manual input required</li>
                                <li><i class="fas fa-check"></i> Secure and accurate scanning</li>
                                <li><i class="fas fa-check"></i> Works in low light conditions</li>
                                <li><i class="fas fa-check"></i> Supports all QR code types</li>
                            </ul>
                        </div>

                        <!-- Step 2 Content -->
                        <div class="content-item" data-step="2">
                            <h3 class="content-title">Enter Amount & Confirm Details</h3>
                            <p class="content-description">
                                Type the payment amount, add a note if needed, and review the details. Our secure platform ensures your transaction is protected with bank-grade encryption and real-time validation.
                            </p>
                            <ul class="content-features">
                                <li><i class="fas fa-check"></i> Bank-grade encryption</li>
                                <li><i class="fas fa-check"></i> Real-time amount validation</li>
                                <li><i class="fas fa-check"></i> Secure confirmation process</li>
                                <li><i class="fas fa-check"></i> Multiple currency support</li>
                                <li><i class="fas fa-check"></i> Transaction history saved</li>
                            </ul>
                        </div>

                        <!-- Step 3 Content -->
                        <div class="content-item" data-step="3">
                            <h3 class="content-title">Instant Money Transfer</h3>
                            <p class="content-description">
                                Confirm the payment and watch the money transfer instantly. The recipient gets notified immediately and can access the funds in seconds, not hours. Experience lightning-fast transactions.
                            </p>
                            <ul class="content-features">
                                <li><i class="fas fa-check"></i> Lightning-fast processing</li>
                                <li><i class="fas fa-check"></i> Instant recipient notification</li>
                                <li><i class="fas fa-check"></i> Real-time confirmation</li>
                                <li><i class="fas fa-check"></i> 24/7 processing available</li>
                                <li><i class="fas fa-check"></i> Email confirmation sent</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Right Side - Image -->
                <div class="col-xl-6 col-lg-6 col-md-12">
                    <div class="process-visual" data-aos="fade-left" data-aos-duration="1400">
                        <img src="{{ asset('public/frontend/images/element/qr-scanded-advantage.webp') }}" alt="Scan QR Code to select recipient" class="visual-image active" data-step="1">
                        <img src="{{ asset('public/frontend/images/element/qr-scanded-sending-money.webp') }}" alt="Enter payment amount and confirm details" class="visual-image" data-step="2">
                        <img src="{{ asset('public/frontend/images/element/qr-scanded-happy-sending.webp') }}" alt="Instant money transfer confirmation" class="visual-image" data-step="3">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End how it works section
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="app-section ">
    <div class="container">
        <div class="app-wrapper">
            <div class="row justify-content-center align-items-center mb-30-none">
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="app-thumb">
                        <img src="{{ asset('public/frontend/images/element/app-holding.webp') }}" alt="eSIM Mobile App - Manage your eSIM plans and connectivity">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 mb-30">
                    <div class="section-heading" data-aos="fade-up" data-aos-duration="1400">
                        <div class="row justify-content-center">
                            <div class="col-xl-12">
                                <div class="section-heading__content ">
                                    <!-- New subtitle section with icon -->
                                    <div class="section-subtitle">
                                        <div class="subtitle-icon">
                                            <i class="fa-solid fa-qrcode"></i>
                                            <div class="scan-line"></div>
                                        </div>
                                        <span class="subtitle">Download QRTip App</span>
                                    </div>
                                
                                    <h2 class="title">Fast & Secure Solution For <span class="title-strong">Money Transfers</span></h2>
                                    <p class="description">Send and receive payments instantly with our secure platform. Give instant tips to performers, pay freelancers in seconds, split bills with friends, and conduct business transactions - all with bank-grade security and real-time processing.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="app-content">
                        <div class="app-btn-wrapper">
                            <a href="#0" class="app-btn">
                                <div class="icon">
                                    <i class="fab fa-google-play text-white"></i>
                                </div>
                                <div class="content">
                                    <span>Get It On</span>
                                    <h6 class="title">Google Play</h6>
                                </div>
                                <div class="app-qr">
                                    <img src="{{ asset('public/frontend/images/element/play-qr.png') }}" alt="Google Play Store QR Code">
                                </div>
                            </a>
                            <a href="#0" class="app-btn">
                                <div class="icon">
                                    <i class="fab fa-apple text-white"></i>
                                </div>
                                <div class="content">
                                    <span>Get It On</span>
                                    <h6 class="title">App Store</h6>
                                </div>
                                <div class="app-qr">
                                    <img src="{{ asset('public/frontend/images/element/app-qr.png') }}" alt="Apple App Store QR Code">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End App
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="testimonial-section ptb-80">
    <div class="container">
        <div class="section-heading" data-aos="fade-up" data-aos-duration="1400">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="section-heading__content text-center">
                        <!-- New subtitle section with icon -->
                        <div class="section-subtitle">
                            <div class="subtitle-icon">
                                <i class="fa-solid fa-qrcode"></i>
                                <div class="scan-line"></div>
                            </div>
                            <span class="subtitle">User Experiences</span>
                        </div>
                    
                        <h2 class="title"> What Our <span class="title-strong">Users Say </span></h2>
                        <p class="description">Discover how Qrtip is transforming the way people send and receive payments instantly across various services and industries.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="testimonial-wrapper">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <div class="testimonial-content-slider">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="testimonial-quote-wrapper">
                                            <div class="testimonial-quote-icon">
                                                <svg height="80" viewBox="0 0 30 30" width="80" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_11027177"><g id="content" fill="none" fill-rule="evenodd"><g id="content_041-open_quote-text-type-editor" fill="#000" transform="translate(-45 -225)"><path d="m54.4334094 243.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4zm14.4320018 5.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4z" transform="matrix(-1 0 0 -1 121.001 481.001)"></path></g></g></svg>
                                            </div>
                                        </div>
                                        <p>"As a restaurant waiter, Qrtip has transformed how I receive tips. Customers love the convenience of scanning and paying instantly. My tips have increased by 40% since we started using this system!"</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-quote-wrapper">
                                            <div class="testimonial-quote-icon">
                                                <svg height="80" viewBox="0 0 30 30" width="80" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_11027177"><g id="content" fill="none" fill-rule="evenodd"><g id="content_041-open_quote-text-type-editor" fill="#000" transform="translate(-45 -225)"><path d="m54.4334094 243.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4zm14.4320018 5.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4z" transform="matrix(-1 0 0 -1 121.001 481.001)"></path></g></g></svg>
                                            </div>
                                        </div>
                                        <p>"I use Qrtip for my Uber driving side hustle. Passengers appreciate the easy tipping option without needing cash. The instant payment feature means I get my tips immediately after each ride - no more waiting!"</p>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="testimonial-quote-wrapper">
                                            <div class="testimonial-quote-icon">
                                                <svg height="80" viewBox="0 0 30 30" width="80" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" id="fi_11027177"><g id="content" fill="none" fill-rule="evenodd"><g id="content_041-open_quote-text-type-editor" fill="#000" transform="translate(-45 -225)"><path d="m54.4334094 243.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4zm14.4320018 5.886137c-.7598293 1.064514-2.1960242 2.210486-4.1512585 3.164501-.5081164.247924-.2789027 1.016359.2820027.945409 4.1081402-.519646 6.7708561-2.318857 8.2249178-4.994493.5408062-.995143.8805775-2.054364 1.0615222-3.135641.1193031-.712924.150814-1.247961.150814-1.865913 0-2.761424-2.2385762-5-5-5-2.7614237 0-5 2.238576-5 5s2.274292 5.001554 4.8878174 5.001554c-.1378784.378573-.1709981.485557-.4558156.884583zm-3.4320018-5.886137c0-2.209139 1.790861-4 4-4s4 1.790861 4 4c0 .56742-.0285517 1.052212-.1370995 1.700864-.1636566.977969-.4698738 1.932586-.9538733 2.823199-1.299494 2.391214-3.5557557 3.447556-4.462863 3.753227.7613075-.591358 1.3684423-1.205907 1.7997654-1.810186.8646465-1.211362.949694-2.467104-.2459296-2.467104-2.209139 0-4-1.790861-4-4z" transform="matrix(-1 0 0 -1 121.001 481.001)"></path></g></g></svg>
                                            </div>
                                        </div>
                                        <p>"The security features give me peace of mind when paying street vendors and coffee shops. No more worrying about carrying cash. The transaction history helps me track my spending across all my favorite local businesses."</p>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-user-slider-wrapper">
                                <div class="testimonial-user-slider">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="testimonial-user-wrapper">
                                                <div class="testimonial-user-thumb">
                                                    <img src="{{ asset('public/frontend/images/user/user-1.jpg') }}" alt="James Rodriguez - Restaurant Server">
                                                </div>
                                                <div class="testimonial-user-content">
                                                    <h6 class="title">James Rodriguez</h6>
                                                    <span class="sub-title">Restaurant Server</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-user-wrapper">
                                                <div class="testimonial-user-thumb">
                                                    <img src="{{ asset('public/frontend/images/user/user-2.jpg') }}" alt="Sarah Chen - Uber Driver">
                                                </div>
                                                <div class="testimonial-user-content">
                                                    <h6 class="title">Sarah Chen</h6>
                                                    <span class="sub-title">Uber Driver</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="testimonial-user-wrapper">
                                                <div class="testimonial-user-thumb">
                                                    <img src="{{ asset('public/frontend/images/user/user-1.jpg') }}" alt="Marcus Johnson - Regular User">
                                                </div>
                                                <div class="testimonial-user-content">
                                                    <h6 class="title">Marcus Johnson</h6>
                                                    <span class="sub-title">Regular User</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Testimonial
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Faq
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<section class="faq-section pt-80" id="contactUs">
    <div class="container">
        <div class="section-heading" data-aos="fade-up" data-aos-duration="1400">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="section-heading__content text-center">
                        <!-- New subtitle section with icon -->
                        <div class="section-subtitle">
                            <div class="subtitle-icon">
                                <i class="fa-solid fa-qrcode"></i>
                                <div class="scan-line"></div>
                            </div>
                            <span class="subtitle">QRTip FAQ</span>
                        </div>
                    
                        <h2 class="title">Frequently Asked <span class="title-strong">Questions</span></h2>
                        <p class="description">Get instant answers about Qrtip's secure payment platform. Learn how to send money instantly, tip service providers, split bills, and make secure transactions with bank-level protection.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mb-30-none">
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="faq-wrapper">
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">How does Qrtip ensure the security of my payments?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Qrtip uses military-grade 256-bit encryption, PCI-DSS compliance, and two-factor authentication to protect all transactions. Your financial data is secured with bank-level security protocols and real-time fraud monitoring systems.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">How quickly are payments processed with Qrtip?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>All Qrtip payments are processed instantly. Whether you're tipping a performer, paying a freelancer, or splitting bills with friends, transactions complete in under 3 seconds with real-time confirmation for both sender and receiver.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">Can I use Qrtip for international money transfers?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Yes! Qrtip supports instant payments across 150+ countries with competitive exchange rates. Send money globally with the same speed and security as domestic transactions, making it perfect for freelancers and international businesses.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">What payment methods does Qrtip accept?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Qrtip supports multiple payment options including credit/debit cards, bank transfers, digital wallets, and QR code payments. We continuously add new payment methods to ensure flexibility and convenience for all users.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 mb-30">
                <div class="faq-wrapper">
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">How does the QR code payment system work?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Simply scan any Qrtip QR code using our app to instantly send payments. The QR contains encrypted recipient information, ensuring accurate and secure transactions. Perfect for quick tips, retail payments, and service provider transactions.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">Are there any transaction limits on Qrtip?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Qrtip offers flexible limits based on account verification. Basic accounts can send up to $1,000 daily, while verified accounts enjoy higher limits. All limits are designed to balance convenience with security requirements.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">What happens if I send money to the wrong person?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Qrtip's verification system requires recipient confirmation, minimizing errors. If an incorrect payment occurs, our 24/7 support team can assist with resolution. We recommend double-checking recipient details before confirming any transaction.</p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <h6 class="faq-title"><span class="title">Is customer support available for payment issues?</span><span class="right-icon"></span></h6>
                        <div class="faq-content">
                            <p>Yes! Qrtip provides 24/7 multilingual customer support via live chat, email, and phone. Our dedicated team specializes in payment resolution, technical support, and account security to ensure seamless transaction experiences.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Faq
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->

<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    Start Contact
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
<div class="contact-section ptb-80" id="contactUs" data-aos="fade-up" data-aos-duration="1400">
    <div class="container">
        <div class="contact-wrapper">
            <div class="row justify-content-center align-items-center mb-30-none">
                <div class="col-xl-6 col-lg-6 mb-30">
                     <div class="section-heading pt-40" data-aos="fade-up" data-aos-duration="1400">
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <div class="section-heading__content text-center">
                                    <!-- New subtitle section with icon -->
                                    <div class="section-subtitle">
                                        <div class="subtitle-icon">
                                            <i class="fa-solid fa-qrcode"></i>
                                            <div class="scan-line"></div>
                                        </div>
                                        <span class="subtitle">Contacts</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="contact-widget-item-wrapper">
                        <div class="contact-header">
                            <h5 class="title">Keep In Touch With Us.</h5>
                            <p>For more information about our services, get in touch with our expert consultants.</p>
                        </div>
                        <div class="contact-widget-item">
                            <div class="contact-widget-icon">
                                <img src="{{ asset('public/frontend/images/icon/tracking.svg') }}" alt="icon">
                            </div>
                            <div class="contact-widget-content">
                                <h5 class="title">Address</h5>
                                <p>328 Queensberry Street, North</p>
                                <p>Melbourne VIC 3051, Australia.</p>
                            </div>
                        </div>
                        <div class="contact-widget-item">
                            <div class="contact-widget-icon">
                                <img src="{{ asset('public/frontend/images/icon/call.svg') }}" alt="icon">
                            </div>
                            <div class="contact-widget-content">
                                <h5 class="title">Phone</h5>
                                <p>+(0) 392 94 03 01</p>
                            </div>
                        </div>
                        <div class="contact-widget-item">
                            <div class="contact-widget-icon">
                                <img src="{{ asset('public/frontend/images/icon/mail.svg') }}" alt="icon">
                            </div>
                            <div class="contact-widget-content">
                                <h5 class="title">Email</h5>
                                <p>contact@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 ">
                    <div class="contact-form-area" data-aos="fade-left" data-aos-duration="1800">
                        <div class="contact-header">
                            <h5 class="title">Tell us about yourself</h5>
                            <p>Whether you have questions or you would just like to say hello, contact us.</p>
                        </div>
                        <form class="contact-form">
                            <div class="row justify-content-center mb-10-none">
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <label>Name<span>*</span></label>
                                    <input type="text" name="text" class="form--control" placeholder="Enter Name...">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 form-group">
                                    <label>Email<span>*</span></label>
                                    <input type="email" name="email" class="form--control" placeholder="Enter Email...">
                                </div>
                                <div class="col-xl-12 col-lg-12 form-group">
                                    <label>Message<span>*</span></label>
                                    <textarea class="form--control" placeholder="Write Here..."></textarea>
                                </div>
                                <div class="col-lg-12 form-group" style="margin-right:30px ;">
                                    <button type="submit" class="btn--base mt-10 w-100">Send Message </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
    End Contact
~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
@endsection


@push("script")
    
@endpush