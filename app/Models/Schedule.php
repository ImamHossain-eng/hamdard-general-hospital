<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['doctor_id', 'day', 'start_time', 'end_time'];

    protected $dates = ['created_at', 'updated_at', 'start_time', 'end_time'];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function appoinments(){
        return $this->hasMany(Appoinment::class);
    }

}
