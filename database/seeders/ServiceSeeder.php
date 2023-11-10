<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Haircut',
                'description' => 'Standard haircut service',
                'price' => 60000,
                'duration' => 30,
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'Peek a Boo',
                'description' => 'Hidden color highlights',
                'price' => 200000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hairlight',
                'description' => 'Lightening sections of hair',
                'price' => 250000,
                'duration' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Balayage',
                'description' => 'Freehand hair painting',
                'price' => 450000,
                'duration' => 240,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Basic Colour',
                'description' => 'Single color application',
                'price' => 100000,
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'K-Perm',
                'description' => 'Korean-style perm',
                'price' => 250000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Down-Perm',
                'description' => 'Straight hair perm',
                'price' => 150000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'K-Smoothing',
                'description' => 'Keratin smoothing treatment',
                'price' => 300000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aromatic Creambath',
                'description' => 'Relaxing aromatic creambath',
                'price' => 150000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Service::insert($services);
    }
}
