@extends('layouts.app')

@section('content')
<div class="slider-area2" style="height: 150px;"></div>
<section class="service-area section-padding25">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-8 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-50 mt-30">
                    <h2>Pilih Jadwal untuk {{ $kapster->name }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (!empty($availableDates))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Slot Waktu Tersedia</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($availableDates as $date)
                        <tr>
                            <td>{{ date('Y-m-d', strtotime($date)) }}</td>
                            <td>
                                @if (!empty($availableSlotsByDate[$date]))
                                <div class="schedule-slot-list">
                                    @foreach ($availableSlotsByDate[$date] as $slot)
                                    <a href="{{ route('booking-details', ['date' => $date, 'time' => $slot['waktu']]) }}"
                                        class="genric-btn primary-border custom-link">
                                        {{ $slot['waktu'] }}
                                    </a>
                                    @endforeach
                                </div>
                                @else
                                <p>Tidak ada slot waktu tersedia untuk tanggal ini.</p>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p>Tidak ada tanggal yang tersedia.</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection