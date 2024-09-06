<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasFactory;

    protected $fillable = [

        'state_id',
        'name'

    ];

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }
}
