@extends('layouts.app')

@section('content')
<div class="slider-area2" style="height: 150px;"></div>
<!-- Akhir Hero -->
<!-- Tim Start -->
<div class="team-area pb-50 pt-50">
    <div class="container">
        <h1 class="mb-4">Daftar Booking Hari Ini</h1>

        <!-- Filter untuk mengatur tanggal -->
        <form method="GET" action="{{ route('kapster.dashboard') }}" class="mb-4">
            <div class="form-group">
                <div class="input-group">
                    <input type="date" name="tanggal" id="tanggal" class="form-control form-control-lg"
                        value="{{ $tanggal }}" onchange="this.form.submit()">
                </div>
            </div>
        </form>

        @if($kapsterBookings->count() > 0)
        <div class="row">
            @foreach ($kapsterBookings as $booking)
            <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                <div class="card booking-card">
                    <div class="card-body">
                        <h5 class="card-title">Pelanggan: {{ $booking->customer->user->name }}</h5>
                        <p class="card-text"><strong>Tanggal Booking:</strong> {{ $booking->booking_date }}</p>
                        <p class="card-text"><strong>Waktu Booking:</strong> {{ $booking->booking_time }} - {{
                            $booking->end_time }}</p>
                        <p class="card-text"><strong>Layanan:</strong> {{ $booking->service->name }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="card-text">
                                <strong>Status:</strong>
                                <span
                                    class="badge {{ $booking->status === 'Antri' ? 'badge-primary' : 'badge-secondary' }}">
                                    {{ $booking->status }}
                                </span>
                            </p>
                            <form method="POST" action="{{ route('kapster.updateStatus', $booking->id) }}" class="mt-3">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success">Selesai</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>


        <!-- Tampilkan tombol pagination -->
        <div class="mt-4">
            {{ $kapsterBookings->links() }}
        </div>
        @else
        <p class="mt-4">Tidak ada booking yang tersedia untuk tanggal ini.</p>
        @endif
    </div>
</div>
@endsection