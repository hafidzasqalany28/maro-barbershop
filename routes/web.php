<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KapsterController;
use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\AdminKapsterController;
use App\Http\Controllers\AdminServiceController;
use App\Http\Controllers\AdminCustomerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute untuk halaman 'home' yang bisa diakses tanpa login
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/services', [HomeController::class, 'services'])->name('services');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::post('/midtrans/webhook', [BookingController::class, 'midtransWebhook'])->name('midtrans-webhook');

Auth::routes();

Route::middleware(['auth'])->group(function () {

    // Rute yang hanya bisa diakses oleh akun role_id 2 (customer)
    Route::group(['middleware' => 'customer'], function () {
        Route::match(['get', 'post'], '/select-service', [BookingController::class, 'selectService'])->name('select-service');
        Route::match(['get', 'post'], '/select-kapster', [BookingController::class, 'selectKapster'])->name('select-kapster');
        Route::match(['get', 'post'], '/select-schedule/{kapsterId}', [BookingController::class, 'selectSchedule'])->name('select-schedule');
        Route::match(['get', 'post'], '/booking-details/{date}/{time}', [BookingController::class, 'bookingDetails'])->name('booking-details');
        Route::get('/booking/history', [BookingController::class, 'history'])->name('booking.history');
    });

    // Rute yang hanya bisa diakses oleh akun role_id 1 (admin)
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::resource('admin/kapsters', AdminKapsterController::class);
        Route::resource('admin/services', AdminServiceController::class);
        Route::resource('admin/customers', AdminCustomerController::class);
        Route::get('admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings');
    });


    // Rute yang hanya bisa diakses oleh akun role_id 3 (kapster)
    Route::group(['middleware' => 'kapster'], function () {
        Route::get('/kapster/dashboard', [KapsterController::class, 'index'])->name('kapster.dashboard');
        Route::patch('/kapster/update-status/{bookingId}', [KapsterController::class, 'updateStatus'])->name('kapster.updateStatus');
    });
});
