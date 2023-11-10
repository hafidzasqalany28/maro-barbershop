@extends('layouts.app')

@section('content')
<div class="slider-area2" style="height: 150px;"></div>
<section class="team-area pb-180">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-100 mt-30">
                    <h2>Rincian Pemesanan:</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="booking-summary">
                    <h2>Rincian Pemesanan:</h2>
                    <ul>
                        <li><strong>Tanggal:</strong> {{ $selectedDate }}</li>
                        <li><strong>Jam:</strong> {{ $selectedTime }}</li>
                        <li><strong>Kapster:</strong> {{ $selectedKapster->name }}</li>
                        <li><strong>Layanan:</strong> {{ $selectedService->name }}</li>
                        <li><strong>Durasi:</strong> {{ $selectedService->duration }} menit</li>
                        <li><strong>Ekspetasi berakhir:</strong> {{ $endTime }}</li>
                    </ul>
                </div>
                <form method="POST"
                    action="{{ route('booking-details', ['date' => $selectedDate, 'time' => $selectedTime]) }}">
                    @csrf
                    <input type="hidden" name="selectedDate" value="{{ $selectedDate }}">
                    <input type="hidden" name="selectedTime" value="{{ $selectedTime }}">
                    <input type="hidden" name="selectedServiceId" value="{{ $selectedService->id }}">
                    <input type="hidden" name="selectedKapsterId" value="{{ $selectedKapster->id }}">
                    <input type="hidden" name="endTime" value="{{ $endTime }}">
                    <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection