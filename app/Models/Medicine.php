<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = [
        'medicine_name',
        'composition',
        'dosage',
        'timing',
        'dose_repetition',
        'remark'
    ];

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}