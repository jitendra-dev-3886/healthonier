<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxManager extends Model
{
    use HasFactory;
    protected $fillable = [
        'dcotor_id',
        'tax_name',
        'amount',
        'tax_description'
    ];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }


}