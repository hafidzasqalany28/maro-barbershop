@extends('layouts.app')

@section('content')
<!-- Hero Start -->
<div class="slider-area2" style="height: 150px;"></div>
<!-- Hero End -->

<!-- Services Area Start -->
<section class="service-area section-padding25">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
            <div class="col-12 text-center">
                <div class="section-tittle mb-50 mt-30">
                    <h2>Layanan Terbaik yang Kami Tawarkan untuk Anda</h2>
                </div>
            </div>
        </div>

        <!-- Section Caption -->
        <div class="row">
            @foreach ($services as $service)
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                <div class="services-caption text-center mb-30">
                    <div class="service-icon">
                        <!-- Mengganti ikon dengan ikon "Haircut" -->
                        <i class="flaticon-healthcare-and-medical"></i>
                    </div>
                    <div class="service-cap">
                        <h4><a href="#">{{ $service->name }}</a></h4>
                        <p>{{ $service->description }}</p>
                        <p>Harga: Rp {{ number_format($service->price) }}</p>
                        <p>Durasi: {{ $service->duration }} Menit</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Services Area End -->
@endsection