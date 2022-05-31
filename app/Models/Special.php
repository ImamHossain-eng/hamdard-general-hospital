<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Special extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'speciality',
        'position'
    ];

    protected $dates = [
        'deleted_at',
        'created_at',
        'updated_at'
    ];

}
