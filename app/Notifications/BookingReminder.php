<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class BookingReminder extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function toMail($notifiable)
    {
        $ngrokUrl = env('NGROK_URL', 'https://your-default-url.com');

        return (new MailMessage)
            ->line('Reminder for your upcoming booking.')
            ->line('Booking Details:')
            ->line('Service: ' . $this->booking->service->name)
            ->line('Kapster: ' . $this->booking->kapster->name)
            ->line('Date: ' . $this->booking->booking_date)
            ->line('Time: ' . $this->booking->booking_time)
            ->action('View Booking', url($ngrokUrl . '/booking/history/'))
            ->line('Thank you for using our booking system!');
    }


    public function via($notifiable)
    {
        return ['mail'];
    }
}
