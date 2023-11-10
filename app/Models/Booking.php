<?php

namespace App\Models;

use App\Models\Kapster;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    protected $fillable = ['customer_id', 'kapster_id', 'service_id', 'booking_date', 'booking_time', 'end_time', 'status'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function kapster()
    {
        return $this->belongsTo(Kapster::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
