<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'temperature_min',
        'temperature_max',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
