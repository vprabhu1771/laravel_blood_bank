<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Area extends Model
{
    use HasFactory;

    protected $fillable = [

        'city_id',

        'name'
    ];

    public function city(){

        return $this->belongsTo(City::class, 'city_id');
    }
}
