<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requester_id',
        'donor_id',
        'blood_group',
        'city',
        'units',
        'status',
        'message'
    ];

    public function requester() 
    { 
        return $this->belongsTo(User::class, 'requester_id'); 
    }

    public function donor() 
    { 
        return $this->belongsTo(User::class, 'donor_id'); 
    }
}
