<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kapster;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil total pelanggan, layanan, kapster, dan pemesanan
        $totalPelanggan = Customer::count();
        $totalLayanan = Service::count();
        $totalKapster = Kapster::count();
        $totalPemesanan = Booking::count();

        // Mengambil data pemesanan yang akan datang (upcoming bookings) dan data pemesanan yang telah diselesaikan (completed bookings)
        $upcomingBookings = Booking::whereDate('booking_date', '>', now())->get();
        $completedBookings = Booking::where('status', 'antri')->get();

        // Mengambil data pemesanan yang dibatalkan (pending payment bookings) dan data pemesanan yang belum dibayar
        $pendingPaymentBookings = Booking::where('status', 'pending')->get();

        // Menghitung total pendapatan dari pemesanan yang telah diselesaikan
        $totalPendapatan = $completedBookings->sum(function ($booking) {
            return $booking->service->price;
        });

        // Jumlah pemesanan yang belum dibayar
        $jumlahPendingPembayaran = $pendingPaymentBookings->count();

        // Menghitung total harga pesanan yang masih "Pending Payment"
        $totalHargaPending = $pendingPaymentBookings->sum(function ($booking) {
            return $booking->service->price;
        });

        return view('admin.dashboard', compact('totalPelanggan', 'totalLayanan', 'totalKapster', 'totalPemesanan', 'upcomingBookings', 'completedBookings', 'pendingPaymentBookings', 'totalPendapatan', 'jumlahPendingPembayaran', 'totalHargaPending'));
    }
}
