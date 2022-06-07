<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appoinment;

class UserController extends Controller
{
    public function user_appointment(){
        $appoinments = auth()->user()->appoinments;
        return view('user.appoinment.index', compact('appoinments'));
    }
    public function user_appointment_create(){
        return view('user.appoinment.create');
    }
}
