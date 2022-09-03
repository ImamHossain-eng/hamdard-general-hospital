<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bed extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_number',
        'bed_number',
        'bed',
        'booked'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

}
