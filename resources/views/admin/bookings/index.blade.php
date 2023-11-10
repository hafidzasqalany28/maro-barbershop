@extends('adminlte::page')

@section('title', 'All Bookings')

@section('content_header')
<h1>All Bookings</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <table id="bookingsTable" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer Name</th>
                    <th>Kapster Name</th>
                    <th>Service Name</th>
                    <th>Price</th>
                    <th>Booking Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->customer ? $booking->customer->name : 'Customer Not Found' }}</td>
                    <td>{{ $booking->kapster ? $booking->kapster->name : 'Kapster Not Found' }}</td>
                    <td>{{ $booking->service ? $booking->service->name : 'Service Not Found' }}</td>
                    <td>Rp {{ number_format($booking->service->price, 0, ',', '.') }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>{{ $booking->end_time }}</td>
                    <td>{{ $booking->status }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="9">No bookings found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-between">
            <div>
                Showing {{ $bookings->firstItem() }} to {{ $bookings->lastItem() }} of {{ $bookings->total() }} results
            </div>
            <div>
                @if ($bookings->onFirstPage())
                <button class="btn btn-default disabled">Previous</button>
                @else
                <a href="{{ $bookings->previousPageUrl() }}" class="btn btn-primary">Previous</a>
                @endif

                @if ($bookings->hasMorePages())
                <a href="{{ $bookings->nextPageUrl() }}" class="btn btn-primary">Next</a>
                @else
                <button class="btn btn-default disabled">Next</button>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection