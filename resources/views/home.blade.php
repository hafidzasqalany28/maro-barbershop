@extends('layouts.app')

@section('content')
<!-- Slider Area Start -->
<div class="slider-area position-relative fix">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 col-md-11 col-sm-10">
                        <div class="hero__caption">
                            <span data-animation="fadeInUp" data-delay="0.2s">bersama maro-barbershop</span>
                            <h1 data-animation="fadeInUp" data-delay="0.5s">Gaya Rambut Kami Membuat Anda Terlihat
                                Elegan</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Stroke Text -->
    <div class="stock-text">
        <h2>Get More Confident</h2>
        <h2>Get More Confident</h2>
    </div>
    <!-- Arrow -->
    <div class="thumb-content-box">
        <div class="thumb-content">
            <h3>Langsung Booking Sekarang !</h3>
            <a href="#"><i class="fas fa-long-arrow-alt-right"></i></a>
        </div>
    </div>
</div>
<!-- Slider Area End -->

<!-- About Area Start -->
<section class="about-area section-padding30 position-relative">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-11">
                <!-- About Image -->
                <div class="about-img">
                    <img src="{{ asset('assets/img/gallery/about.png') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-caption">
                    <!-- Section Title -->
                    <div class="section-tittle section-tittle3 mb-35">
                        <span>Tentang Perusahaan Kami</span>
                        <h2>52 Tahun Pengalaman dalam Potongan Rambut!</h2>
                    </div>
                    <p class="mb-30 pera-bottom">Maro Barbershop menyajikan layanan potongan rambut dengan pendekatan
                        yang fleksibel, nyaman, dan modern. Kami memahami bahwa setiap individu memiliki preferensi dan
                        kebutuhan yang unik. Itulah mengapa kami memberikan Anda kebebasan untuk memilih tata letak dan
                        elemen yang sesuai dengan selera Anda, dengan kemungkinan kustomisasi tanpa batas. Kami dengan
                        teliti mereplikasi visi perancang untuk memberikan hasil yang sesuai dengan ekspektasi Anda.
                        Selami pengalaman unik potongan rambut Anda di Maro Barbershop!</p>
                    <p class="mb-30 pera-bottom">Kami berkomitmen untuk memberikan layanan yang fleksibel dan beragam
                        agar Anda merasa nyaman dan puas. Di Maro Barbershop, Anda memiliki kebebasan untuk memilih
                        layanan
                        yang sesuai dengan preferensi Anda. Kami mengundang Anda untuk mengunjungi Maro Barbershop dan
                        merasakan pengalaman potongan rambut terbaik yang kami tawarkan. Dapatkan penampilan terbaik
                        Anda dengan layanan kami!</p>
                    <img src="{{ asset('assets/img/gallery/signature.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- About Shape -->
    <div class="about-shape">
        <img src="{{ asset('assets/img/gallery/about-shape.png') }}" alt="">
    </div>
</section>
<!-- About Area End -->

<!-- Services Area Start -->
<section class="service-area pb-170">
    <div class="container">
        <!-- Section Title -->
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-90">
                    <span>Layanan Profesional</span>
                    <h2>Layanan Terbaik yang Kami Tawarkan untuk Anda</h2>
                </div>
            </div>
        </div>
        <!-- Section Caption -->
        <div class="row">
            @foreach($services as $service)
            <div class="col-xl-4 col-lg-4 col-md-6">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <!-- Mengganti ikon dengan ikon "Haircut" -->
                        <i class="flaticon-healthcare-and-medical"></i>
                    </div>
                    <div class="service-cap">
                        <h4><a href="#">{{ $service->name }}</a></h4>
                        <p>{{ $service->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Services Area End -->

<!-- Best Pricing Area Start -->
<div class="best-pricing section-padding2 position-relative" style="margin-bottom: 10%;">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-7 col-lg-7">
                <div class="section-tittle mb-50">
                    <span>Harga Terbaik Kami</span>
                    <h2>Kami Menyediakan Harga Terbaik di Kota Anda!</h2>
                </div>
                <!-- Pricing  -->
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="pricing-list">
                            <ul>
                                <li>{{ $service->name }}<span> . . . . . . . . . Rp {{ number_format($service->price)
                                        }}</span></li>
                            </ul>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Pricing Images -->
    <div class="pricing-img">
        <img class="pricing-img1" src="{{ asset('assets/img/gallery/pricing1.png') }}" alt="">
        <img class="pricing-img2" src="{{ asset('assets/img/gallery/pricing2.png') }}" alt="">
    </div>
</div>
@endsection