<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $table = 'patients';
    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    // public function feeConcessions()
    // {
    //     return $this->hasMany(FeeConcession::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feeConcessions()
    {
        return $this->belongsTo(FeeConcession::class);
    }
}