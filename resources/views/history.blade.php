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
            <div class="col-md-12">
                @if ($bookings->count() > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Booking</th>
                            <th>Layanan</th>
                            <th>Kapster</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td>{{ $booking->service->name }}</td>
                            <td>{{ $booking->kapster->name }}</td>
                            <td>{{ $booking->booking_time }}</td>
                            <td>{{ $booking->end_time }}</td>
                            <td>Rp {{ number_format($booking->service->price, 0, ',', '.') }}</td>
                            <td>{{ $booking->status }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">Tidak ada riwayat booking.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
                @else
                <p>Tidak ada riwayat booking.</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection