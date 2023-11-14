@extends('layouts.app')

@section('content')
<div class="slider-area2" style="height: 150px;"></div>
<section class="team-area pb-5 pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header text-center bg-light text-white">
                        <h2 class="mb-0">Rincian Pemesanan</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Tanggal:</strong> {{ $selectedDate }}</li>
                            <li class="list-group-item"><strong>Jam:</strong> {{ $selectedTime }}</li>
                            <li class="list-group-item"><strong>Kapster:</strong> {{ $selectedKapster->name }}</li>
                            <li class="list-group-item"><strong>Layanan:</strong> {{ $selectedService->name }}</li>
                            <li class="list-group-item"><strong>Durasi:</strong> {{ $selectedService->duration }} menit
                            </li>
                            <li class="list-group-item"><strong>Ekspetasi berakhir:</strong> {{ $endTime }}</li>
                        </ul>
                    </div>
                    <div class="card-footer text-center">
                        <form method="POST"
                            action="{{ route('booking-details', ['date' => $selectedDate, 'time' => $selectedTime]) }}">
                            @csrf
                            <input type="hidden" name="selectedDate" value="{{ $selectedDate }}">
                            <input type="hidden" name="selectedTime" value="{{ $selectedTime }}">
                            <input type="hidden" name="selectedServiceId" value="{{ $selectedService->id }}">
                            <input type="hidden" name="selectedKapsterId" value="{{ $selectedKapster->id }}">
                            <input type="hidden" name="endTime" value="{{ $endTime }}">
                            <button type="submit" class="btn btn-primary mt-4">Bayar Sekarang</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection