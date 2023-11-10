<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('12345678'),
                'role_id' => 1, // Sesuaikan dengan ID peran admin
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer1',
                'email' => 'customer1@example.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2, // Sesuaikan dengan ID peran customer
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Customer2',
                'email' => 'customer2@example.com',
                'password' => Hash::make('12345678'),
                'role_id' => 2, // Sesuaikan dengan ID peran customer
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Elbasta',
                'email' => 'elbasta@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 3, // Sesuaikan dengan ID peran kapster
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dhoi',
                'email' => 'dhoi@gmail.com',
                'password' => Hash::make('12345678'),
                'role_id' => 3, // Sesuaikan dengan ID peran kapster
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        User::insert($users);
    }
}
