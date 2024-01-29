<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slot extends Model
{
    use HasFactory;
    protected $table = 'slots';
    protected $fillable = [
        'doctor_id ',
        'start_date',
        'end_date',
        'interval_minutes',
        'start_time',
        'end_time'
    ];

}