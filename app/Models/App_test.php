<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_test extends Model
{
    use HasFactory;

    protected $fillable = ['appoinment_id', 'file'];
    protected $dates = ['created_at', 'updated_at'];
    public function appoinment(){
        return $this->belongsTo(Appoinment::class);
    }
}
