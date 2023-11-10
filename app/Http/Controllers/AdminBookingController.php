<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'kapster', 'service'])
            ->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }
}
