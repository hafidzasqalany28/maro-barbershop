<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Booking;
use App\Models\Kapster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KapsterController extends Controller
{
    public function index(Request $request)
    {
        $kapsterId = Auth::user()->kapster->id;
        $kapster = Kapster::find($kapsterId);

        // Mengambil tanggal hari ini
        $today = Carbon::now()->toDateString();

        // Mengambil data booking berdasarkan tanggal yang dipilih atau defaultnya hari ini
        $tanggal = $request->input('tanggal', $today);

        $kapsterBookings = Booking::where('kapster_id', $kapsterId)
            ->whereDate('booking_date', $tanggal)
            ->where('status', 'Antri') // Menambahkan kondisi ini untuk menampilkan status "Antri" saja
            ->paginate(10); // Ganti 10 dengan jumlah item per halaman yang Anda inginkan

        return view('kapster.dashboard', compact('kapsterBookings', 'tanggal'));
    }
}
