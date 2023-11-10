<?php

namespace App\Models;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kapster extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'work_schedule'];
    protected $casts = ['work_schedule' => 'json']; // Untuk mengubah kolom jadwal kerja menjadi tipe data JSON

    public function getFormattedWorkSchedule()
    {
        return json_encode($this->work_schedule, JSON_PRETTY_PRINT);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
