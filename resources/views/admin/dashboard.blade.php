@extends('adminlte::page')

@section('title', 'Admin Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
{{-- box start --}}
<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $totalPelanggan }}</h3>
                <p>Total Pelanggan</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $totalLayanan }}</h3>
                <p>Total Layanan</p>
            </div>
            <div class="icon">
                <i class="fas fa-cut"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $totalKapster }}</h3>
                <p>Total Kapster</p>
            </div>
            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $totalPemesanan }}</h3>
                <p>Total Pemesanan</p>
            </div>
            <div class="icon">
                <i class="fas fa-calendar"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box bg-primary">
            <div class="inner">
                <h3>Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                <p>Pendapatan Bulan Ini</p>
            </div>
            <div class="icon">
                <i class="fas fa-chart-line"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ number_format($totalHargaPending, 0, ',', '.') }}</h3>
                <p>Total Pending Pembayaran</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
</div>
{{-- box end --}}

{{-- info pemesanan --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Info Pemesanan</h3>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="order-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="upcoming-orders-tab" data-toggle="pill" href="#upcoming-orders"
                            role="tab" aria-controls="upcoming-orders" aria-selected="true">Upcoming Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="all-orders-tab" data-toggle="pill" href="#all-orders" role="tab"
                            aria-controls="all-orders" aria-selected="false">All Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pending-payment-orders-tab" data-toggle="pill"
                            href="#pending-payment-orders" role="tab" aria-controls="pending-payment-orders"
                            aria-selected="false">Pending Payment Orders</a>
                    </li>
                </ul>
                <div class="tab-content" id="custom-tabs-content">
                    <!-- Upcoming Orders Tab Content -->
                    <div class="tab-pane show active" id="upcoming-orders" role="tabpanel"
                        aria-labelledby="upcoming-orders-tab">
                        <h4>Upcoming Orders</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Kapster Name</th>
                                        <th>Service Name</th>
                                        <th>Booking Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($upcomingBookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->customer ? $booking->customer->name : 'Customer Not Found' }}
                                        </td>
                                        <td>{{ $booking->kapster ? $booking->kapster->name : 'Kapster Not Found' }}</td>
                                        <td>{{ $booking->service ? $booking->service->name : 'Service Not Found' }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->booking_time }}</td>
                                        <td>{{ $booking->end_time }}</td>
                                        <td>Rp {{ number_format($booking->service->price, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- All Orders Tab Content -->
                    <div class="tab-pane" id="all-orders" role="tabpanel" aria-labelledby="all-orders-tab">
                        <h4>All Orders</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Customer Name</th>
                                        <th>Kapster Name</th>
                                        <th>Service Name</th>
                                        <th>Booking Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($completedBookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>{{ $booking->customer ? $booking->customer->name : 'Customer Not Found' }}
                                        </td>
                                        <td>{{ $booking->kapster ? $booking->kapster->name : 'Kapster Not Found' }}</td>
                                        <td>{{ $booking->service ? $booking->service->name : 'Service Not Found' }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->booking_time }}</td>
                                        <td>{{ $booking->end_time }}</td>
                                        <td>{{ number_format($booking->service->price, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- Pending Payment Orders Tab Content -->
                    <div class="tab-pane" id="pending-payment-orders" role="tabpanel"
                        aria-labelledby="pending-payment-orders-tab">
                        <h4>Pending Payment Orders</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th> <!-- Tambah kolom ID -->
                                        <th>Customer Name</th>
                                        <th>Kapster Name</th>
                                        <th>Service Name</th> <!-- Ubah menjadi Service Name -->
                                        <th>Booking Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Total Payment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pendingPaymentBookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td> <!-- Menampilkan ID booking -->
                                        <td>{{ $booking->customer ? $booking->customer->name : 'Customer Not Found' }}
                                        </td>
                                        <td>{{ $booking->kapster ? $booking->kapster->name : 'Kapster Not Found' }}</td>
                                        <td>{{ $booking->service ? $booking->service->name : 'Service Not Found' }}</td>
                                        <td>{{ $booking->booking_date }}</td>
                                        <td>{{ $booking->booking_time }}</td>
                                        <td>{{ $booking->end_time }}</td>
                                        <td> Rp {{ number_format($booking->service->price, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- info pemesanan end--}}
@stop