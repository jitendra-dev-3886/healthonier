<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $table = 'clinics';
    protected $appends = ['clinic_availabilities'];
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function availabilities()
    {
        return $this->hasMany(Checkavailability::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }


    public function getClinicAvailabilitiesAttribute()
    {
        $availabilities = Checkavailability::where('clinic_id', $this->id)->get();

        $result = [];

        if ($availabilities) {
            $availabilities->each(function ($item, $key) use (&$result) {
                $result[] = Weekday::where('id', $item->weekday_id)->pluck('days')->first();
            });
        }

        return $result;
    }


}