<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeConcession extends Model
{
    use HasFactory;


    public function FeeConcessionGroup()
    {
        return $this->hasMany(FeeConcessionGroup::class);
    }
    public function patient()
    {
        return $this->hasOne(Patient::class);
    }


}