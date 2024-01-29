<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;
    protected $fillable = [
        'dcotor_id',
        'tittle',
        'amount',
        'total_amount',
        'tax_status'
    ];


    public function FeeConcessionGroup()
    {
        return $this->hasMany(FeeConcessionGroup::class);
    }
    public function feeTaxFees()
    {
        return $this->hasMany(FeeTaxFee::class);
    }




}