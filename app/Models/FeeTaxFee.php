<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeTaxFee extends Model
{
    use HasFactory;


    protected $table = 'fee_tax_fee';
    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }




}