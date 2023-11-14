@extends('layouts.app')

@section('title', 'Riwayat Booking')

@section('content')
<!-- Hero Start -->
<div class="slider-area2" style="height: 150px;"></div>
<!-- Hero End -->

<section class="service-area section-padding25">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-50 mt-30">
                    <h2>Riwayat Booking</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($bookings as $index => $booking)
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Booking No: {{ $index + 1 }}</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Tanggal Booking:</strong> {{ $booking->booking_date }}
                            </li>
                            <li class="list-group-item"><strong>Layanan:</strong> {{ $booking->service->name }}</li>
                            <li class="list-group-item"><strong>Kapster:</strong> {{ $booking->kapster->name }}</li>
                            <li class="list-group-item"><strong>Jam Mulai:</strong> {{ $booking->booking_time }}</li>
                            <li class="list-group-item"><strong>Jam Selesai:</strong> {{ $booking->end_time }}</li>
                            <li class="list-group-item"><strong>Harga:</strong> Rp {{
                                number_format($booking->service->price, 0, ',', '.') }}</li>
                            <li class="list-group-item"><strong>Status:</strong> {{ $booking->status }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-md-12">
                <p class="text-center">Tidak ada riwayat booking.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection