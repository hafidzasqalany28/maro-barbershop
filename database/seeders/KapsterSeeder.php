<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kapster;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KapsterSeeder extends Seeder
{
    public function run()
    {
        $elbastaUser = User::where('name', 'Elbasta')->first();
        $dhoiUser = User::where('name', 'Dhoi')->first();

        $kapsters = [
            [
                'name' => 'Elbasta',
                'user_id' => $elbastaUser->id,
                'work_schedule' => json_encode([
                    "Monday" => ["12:00-22:00"],
                    "Tuesday" => ["12:00-22:00"],
                    "Wednesday" => ["12:00-22:00"],
                    "Thursday" => ["12:00-22:00"],
                    "Friday" => ["12:00-22:00"],
                    "Saturday" => ["12:00-22:00"],
                    "Sunday" => ["12:00-22:00"]
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dhoi',
                'user_id' => $dhoiUser->id,
                'work_schedule' => json_encode([
                    "Monday" => ["12:00-22:00"],
                    "Tuesday" => ["12:00-22:00"],
                    "Wednesday" => ["12:00-22:00"],
                    "Thursday" => ["12:00-22:00"],
                    "Friday" => ["12:00-22:00"],
                    "Saturday" => ["12:00-22:00"],
                    "Sunday" => ["12:00-22:00"]
                ]), 'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Kapster::insert($kapsters);
    }
}
