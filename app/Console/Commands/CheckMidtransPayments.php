<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Booking;
use GuzzleHttp\Client;

class CheckMidtransPayments extends Command
{
    protected $signature = 'midtrans:check-payments';

    protected $description = 'Check Midtrans payment statuses';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $bookings = Booking::where('status', 'pending')->get();

        $client = new Client();
        $serverKey = 'SB-Mid-server-bmECLoxqY0Y1KY9td2Zh92od'; // Ganti dengan server key Midtrans Anda

        foreach ($bookings as $booking) {
            $orderId = 'BTR-' . $booking->id; // Sesuaikan dengan format order_id yang Anda gunakan
            $midtransBaseUrl = 'https://api.midtrans.com/v2';
            $statusUrl = "$midtransBaseUrl/$orderId/status";

            $response = $client->request('GET', $statusUrl, [
                'headers' => [
                    'Authorization' => 'Basic ' . base64_encode($serverKey . ':'),
                ],
            ]);


            $data = json_decode($response->getBody(), true);

            // Periksa status pembayaran
            if ($data['transaction_status'] === 'settlement') {
                // Perbarui status booking menjadi "antri"
                $booking->status = 'antri';
                $booking->save();
            }
        }

        $this->info('Payment statuses checked successfully.');
    }
}
