<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appoinment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'doctor_id',
        'schedule_id',
        'prescription',
        'payment_id'
    ];

    protected $dates = [
        'date',
        'deleted_at',
        'created_at',
        'updated_at'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    public function schedule(){
        return $this->belongsTo(Schedule::class);
    }

    public function app_test(){
        return $this->hasOne(App_test::class);
    }

}
