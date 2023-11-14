<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'name' => 'Haircut',
                'description' => 'Layanan potong rambut standar',
                'price' => 60000,
                'duration' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peek a Boo',
                'description' => 'Tata rambut dengan sorotan warna tersembunyi',
                'price' => 200000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hairlight',
                'description' => 'Mencerahkan sebagian rambut',
                'price' => 250000,
                'duration' => 180,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Balayage',
                'description' => 'Lukis rambut bebas',
                'price' => 450000,
                'duration' => 240,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Basic Colour',
                'description' => 'Aplikasi warna rambut tunggal',
                'price' => 100000,
                'duration' => 60,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'K-Perm',
                'description' => 'Curly rambut ala Korea',
                'price' => 250000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Down-Perm',
                'description' => 'Curly rambut lurus',
                'price' => 150000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'K-Smoothing',
                'description' => 'Perawatan pelurusan rambut Keratin',
                'price' => 300000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Aromatic Creambath',
                'description' => 'Perawatan creambath aromatik yang menyegarkan',
                'price' => 150000,
                'duration' => 120,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Service::insert($services);
    }
}
