<?php

namespace App\Console\Commands;

use App\Models\Booking;
use Illuminate\Console\Command;
use App\Notifications\BookingReminder;

class SendBookingReminders extends Command
{
    protected $signature = 'send-booking-reminders';
    protected $description = 'Send reminders for upcoming bookings';

    public function handle()
    {
        $upcomingBookings = Booking::whereDate('booking_date', now()->addDay())
            ->where('status', 'antri')
            ->get();

        foreach ($upcomingBookings as $booking) {
            $booking->customer->user->notify(new BookingReminder($booking));
        }

        $this->info('Booking reminders sent successfully.');
    }
}
