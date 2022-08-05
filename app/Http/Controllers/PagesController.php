<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\Message;
use App\Models\Doctor;
use App\Models\User;

use DB;



class PagesController extends Controller
{
    
    public function homepage(){
        $doctors = Doctor::latest()->get();
       return view('pages.homepage', compact('doctors'));
    }
    public function contact(Request $request){
        $this->validate($request, [
            'name' => 'required|string|max:191',
            'email' => 'required|email',
            'body' => 'required'
        ]);
        $message = new Message;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->mobile = $request->input('mobile');
        $message->body = $request->input('body');
        $message->save();
        return redirect()->route('homepage');
    }
    public function doctor_profile($id){
        $doctor = Doctor::find($id);
        return view('pages.doctor_profile', compact('doctor'));
    }
    public function password_update(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        //check password reset eligibility
        $pass_resets = DB::table('password_resets')->where('email', $request->email);
        if($pass_resets){
            $user = User::where('email', $request->email)->first();
        
            $user->password = bcrypt($request->password);
            $user->save();
            $pass_resets->delete();

        }
       
        return redirect()->route('login')->with('success', 'Password has been changed. Please Login Now.');

    
    }
}
