<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [

        'district_id',

        'name',

        'pincode'
    ];

    public function district(){

        return $this->belongsTo(District::class, 'district_id');
    }
}
