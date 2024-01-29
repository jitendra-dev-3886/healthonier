<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MembershipUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'membership_plan_id',
        'membership_amount',
        'expire_date',
    ];

    // Define relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
