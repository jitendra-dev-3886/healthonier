<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeConcessionGroup extends Model
{
    use HasFactory;






    public function fee()
    {
        return $this->belongsTo(Fee::class);
    }

    public function group()
    {
        return $this->belongsTo(FeeConcession::class);
    }




}