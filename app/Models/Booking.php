<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'bookings';
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    public function bookingFee()
    {
        return $this->hasMany(BookingFee::class);
    }


}