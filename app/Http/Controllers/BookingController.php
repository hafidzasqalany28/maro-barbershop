<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use Midtrans\Config;
use App\Models\Booking;
use App\Models\Kapster;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    public function index()
    {
        return view('booking');
    }

    public function selectService(Request $request)
    {
        if ($request->isMethod('post')) {
            session(['selectedServiceId' => $request->input('service_id')]);
            return redirect()->route('select-kapster');
        }

        $services = Service::all();
        return view('select_service', compact('services'));
    }

    public function selectKapster(Request $request)
    {
        if ($request->isMethod('post')) {
            session(['selectedKapsterId' => $request->input('kapster_id')]);
            return redirect()->route('select-schedule', ['kapsterId' => $request->input('kapster_id')]);
        }

        $kapsters = Kapster::all();
        return view('select_kapster', compact('kapsters'));
    }

    public function selectSchedule(Request $request, $kapsterId)
    {
        if ($request->isMethod('post')) {
            session(['selectedDate' => $request->input('selected_date'), 'selectedTime' => $request->input('selected_time')]);
            return redirect()->route('booking-details');
        }

        $kapster = Kapster::findOrFail($kapsterId);
        $timeInterval = 30;
        $availableSlotsByDate = $this->getAvailableSlots($kapster);

        $availableDates = array_keys($availableSlotsByDate);
        sort($availableDates);

        return view('select_schedule', compact('kapster', 'availableSlotsByDate', 'availableDates'));
    }

    public function bookingDetails(Request $request, $date, $time)
    {
        if ($request->isMethod('post')) {
            $booking = $this->createBooking($request);
            if (!$booking) {
                return back()->with('error', 'Terjadi kesalahan dalam pembuatan booking.');
            }

            $snapToken = $this->getMidtransSnapToken($booking);
            if (!$snapToken) {
                return back()->with('error', 'Terjadi kesalahan dalam pembayaran.');
            }

            return redirect()->away('https://app.sandbox.midtrans.com/snap/v2/vtweb/' . $snapToken);
        }

        $selectedServiceId = session('selectedServiceId');
        $selectedService = Service::findOrFail($selectedServiceId);
        $selectedKapsterId = session('selectedKapsterId');
        $selectedKapster = Kapster::findOrFail($selectedKapsterId);
        $selectedDate = $date;
        $selectedTime = $time;
        $endTime = $this->calculateEndTime($selectedService, $selectedTime);

        return view('booking_details', compact('selectedService', 'selectedKapster', 'selectedDate', 'selectedTime', 'endTime'));
    }

    private function createBooking(Request $request)
    {
        $selectedDate = $request->input('selectedDate');
        $selectedTime = $request->input('selectedTime');
        $selectedServiceId = session('selectedServiceId');
        $selectedKapsterId = session('selectedKapsterId');

        $selectedService = Service::findOrFail($selectedServiceId);

        $booking = new Booking();
        $booking->customer_id = Auth::user()->customer->id;
        $booking->kapster_id = $selectedKapsterId;
        $booking->service_id = $selectedServiceId;
        $booking->booking_date = $selectedDate;
        $booking->booking_time = $selectedTime;
        $booking->end_time = $this->calculateEndTime($selectedService, $selectedTime);
        $booking->status = 'pending';
        $booking->save();

        return $booking;
    }

    private function calculateEndTime($service, $startTime)
    {
        $durationInMinutes = $service->duration;
        return date('H:i', strtotime($startTime) + ($durationInMinutes * 60));
    }

    private function getMidtransSnapToken($booking)
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$clientKey = config('midtrans.clientKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        $orderId = 'testong-' . $booking->id;
        $amount = $booking->service->price;
        $customer = $booking->customer;
        $kapster = $booking->kapster;
        $service = $booking->service;

        $transactionDetails = [
            'order_id' => $orderId,
            'gross_amount' => $amount,
        ];

        $customerDetails = [
            'first_name' => $customer->name,
            'email' => $customer->email,
            'phone' => $customer->phone,
        ];

        $itemDetails = [
            [
                'id' => $service->id,
                'price' => $service->price,
                'quantity' => 1,
                'name' => $service->name,
                'brand' => 'Your Brand',
                'category' => 'Service',
            ],
        ];

        $transactionData = [
            'transaction_details' => $transactionDetails,
            'customer_details' => $customerDetails,
            'item_details' => $itemDetails,
        ];

        try {
            return Snap::getSnapToken($transactionData);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function midtransWebhook(Request $request)
    {
        if (!$request->isMethod('post')) {
            return response('Method Not Allowed', 405);
        }

        $input = $request->all();

        if ($input['transaction_status'] === 'settlement') {
            $orderId = $input['order_id'];
            $bookingId = (int) preg_replace('/\D/', '', $orderId);
            $booking = Booking::findOrFail($bookingId);
            $booking->status = 'antri';
            $booking->save();
        }

        return response('OK', 200);
        return redirect()->route('home')->with('success', 'Pembayaran berhasil. Silakan pilih layanan kembali.');
    }

    private function getAvailableSlots($kapster)
    {
        $timeInterval = 30;
        $availableSlotsByDate = [];
        $workSchedule = $this->decodeWorkSchedule($kapster->work_schedule);

        if (!is_array($workSchedule)) {
            return null; // Handle jika work_schedule tidak valid
        }

        foreach ($workSchedule as $day => $workingHours) {
            list($startTime, $endTime) = explode('-', $workingHours[0]);
            $currentTime = $startTime;

            while ($currentTime < $endTime) {
                $currentDate = date('Y-m-d', strtotime("next $day"));
                $currentDateTime = "$currentDate $currentTime";

                $isBooked = $this->isTimeSlotBooked($kapster->id, $currentDate, $currentTime);

                if (!$isBooked) {
                    $availableSlotsByDate[$currentDate][] = [
                        'tanggal' => $currentDate,
                        'waktu' => $currentTime,
                    ];
                }

                $currentTime = date('H:i', strtotime($currentTime) + $timeInterval * 60);
            }
        }

        return $availableSlotsByDate;
    }

    private function decodeWorkSchedule($workSchedule)
    {
        if (is_string($workSchedule)) {
            return json_decode($workSchedule, true);
        }

        return $workSchedule;
    }

    private function isTimeSlotBooked($kapsterId, $currentDate, $currentTime)
    {
        return Booking::where('kapster_id', $kapsterId)
            ->where('booking_date', $currentDate)
            ->where('booking_time', '<=', $currentTime)
            ->where(function ($query) use ($currentTime) {
                $query->where('end_time', '>', $currentTime)->orWhereNull('end_time');
            })
            ->exists();
    }

    public function history()
    {
        $user = auth()->user();
        $customer = $user->customer;

        // Validasi apakah pelanggan memiliki data customer
        if (!$customer) {
            return redirect()->route('tampilkan-pesan-kesalahan');
        }

        $bookings = $customer->bookings;
        return view('history', ['bookings' => $bookings]);
    }
}
