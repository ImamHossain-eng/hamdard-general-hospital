<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

class DoctorController extends Controller
{
    public function dashboard(){
        return view('doctor.home');
    }
    public function my_profile(){
        // $profile = auth()->user()->doctor;
        return view('doctor.profile.myprofile');
    }
    public function my_profile_update(Request $request){
        $this->validate($request, [
            'speciality' => 'required|string',
            'degree' => 'required|string',
            'details' => 'required|string',
        ]);

        $db_doctor = auth()->user()->doctor;
        if(!$db_doctor){
            $doctor = new Doctor;
            $doctor->user_id = auth()->user()->id;
            $doctor->speciality = $request->input('speciality');
            $doctor->degree = $request->input('degree');
            $doctor->details = $request->input('details');
            $doctor->save();
        }else{
            $doctor = auth()->user()->doctor;
            $doctor->speciality = $request->input('speciality');
            $doctor->degree = $request->input('degree');
            $doctor->details = $request->input('details');
            $doctor->save();
        }
        return redirect()->route('doctor.dashboard');
    }
}
