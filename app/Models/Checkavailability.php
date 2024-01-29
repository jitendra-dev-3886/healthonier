<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkavailability extends Model
{
    use HasFactory;
    protected $table = 'clinicavailabilities';
    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function timeslots()
    {
        return $this->belongsTo(Timeslot::class, 'timeslot_id');
    }
}