<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $customer1User = User::where('name', 'Customer1')->first();
        $customer2User = User::where('name', 'Customer2')->first();

        $customers = [
            [
                'name' => 'Customer1',
                'phone' => '1234567890',
                'email' => 'customer1@example.com',
                'user_id' => $customer1User->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer2',
                'phone' => '1234567890',
                'email' => 'customer2@example.com',
                'user_id' => $customer2User->id,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Tambahkan lebih banyak data pelanggan jika diperlukan
        ];

        Customer::insert($customers);
    }
}
