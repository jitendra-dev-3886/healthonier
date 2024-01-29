<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingFee extends Model
{
    use HasFactory;
    protected $table = 'booking_fees';
    protected $fillable = [
        'booking_id',
        'fee_id',
        'amount'
    ];

    public function Fee()
    {
        return $this->belongsTo(Bookings::class);
    }


}