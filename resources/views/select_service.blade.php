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
            <div class="col-12">
                <!-- Displaying a list of selectable services in a responsive table -->
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Service Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Duration (minutes)</th>
                                <th scope="col">Action</th>
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
                                        <button type="submit" class="btn btn-primary btn-sm">Select</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Service Area End -->
@endsection