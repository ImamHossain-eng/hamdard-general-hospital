<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appoinment;

use App\Notifications\InvoicePaid;

class UserController extends Controller
{
    public function test_notification(){
        $invoice = 'Invoice Details';
        $user = auth()->user();
        $user->notify(new InvoicePaid($invoice));
        return "OK";

    }
    public function user_appointment(){
        $appoinments = auth()->user()->appoinments;
        return view('user.appoinment.index', compact('appoinments'));
    }
    public function user_appointment_create(){
        return view('user.appoinment.create');
    }
    public function user_appointment_destroy($id){
        Appoinment::find($id)->delete();
        return redirect()->route('user.appoinment.index')->with('error', 'Appointment Removed');
    }
    public function user_appointment_show($id){
        $app = Appoinment::find($id);
        return view('user.appoinment.show', compact('app'));
    }
}
