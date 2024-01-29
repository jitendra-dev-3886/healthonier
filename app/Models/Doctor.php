<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function clinics()
    {
        return $this->hasMany(Clinic::class);
    }
    public function speciality()
    {
        return $this->belongsTo(Speciality::class);
    }
    public function patients()
    {
        return $this->hasMany(Patient::class);
    }
    public function Tax()
    {
        return $this->hasMany(TaxManager::class);
    }

}