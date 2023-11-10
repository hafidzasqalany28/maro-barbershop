@extends('layouts.app')

@section('content')
<!-- Hero Start -->
<div class="slider-area2" style="height: 150px;"></div>
<!-- Hero End -->
<section class="service-area section-padding25">
    <div class="container">
        <!-- Section Title -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-11 col-sm-11">
                <div class="section-tittle text-center mb-50 mt-30">
                    <h2>Pilih Service</h2>
                </div>
            </div>
        </div>
        <!-- Section Caption -->
        <div class="row">
            <div class="col-12">
                <!-- Menampilkan daftar layanan yang dapat dipilih dalam bentuk tabel -->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Service Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Duration (minutes)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{ $service->name }}</td>
                            <td>{{ $service->description }}</td>
                            <td>RP {{ number_format($service->price, 0, ',', '.') }}</td>
                            <td>{{ $service->duration }}</td>
                            <td>
                                <form method="POST" action="{{ route('select-service') }}">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <button type="submit" class="btn btn-primary">Select</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection