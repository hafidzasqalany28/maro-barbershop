@extends('layouts.app')

@section('content')
<!-- Hero Start -->
<div class="slider-area2" style="height: 150px;"></div>
<!-- Hero End -->

<!-- Service Area Start -->
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
            @foreach($services as $service)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100 d-flex flex-column">
                    <div class="card-body">
                        <h3 class="card-title">{{ $service->name }}</h3>
                        <p class="card-text">{{ $service->description }}</p>
                        <p class="card-text">RP {{ number_format($service->price, 0, ',', '.') }}</p>
                        <p class="card-text">{{ $service->duration }} minutes</p>
                        <form method="POST" action="{{ route('select-service') }}">
                            @csrf
                            <input type="hidden" name="service_id" value="{{ $service->id }}">
                            <button type="submit" class="btn btn-primary btn-sm">Select</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Service Area End -->
@endsection