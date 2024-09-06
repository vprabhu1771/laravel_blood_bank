<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasFactory;

    protected $fillable = [

        'city_id',
        'name'

    ];

    public function city()
    {
        return $this->belongsTo(State::class, 'city_id');
    }
}
