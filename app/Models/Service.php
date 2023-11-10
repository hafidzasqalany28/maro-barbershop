<?php

namespace App\Models;

use App\Models\Booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'duration'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
