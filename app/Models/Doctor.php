<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'name', 'speciality', 'degree', 'details'];

    protected $dates = ['deleted_at', 'created_at', 'updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
