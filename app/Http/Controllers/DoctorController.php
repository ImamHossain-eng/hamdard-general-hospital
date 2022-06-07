<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;

use Image;

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
            'special_id' => 'required',
            'degree' => 'required|string',
            'details' => 'required|string',
        ]);

        $db_doctor = auth()->user()->doctor;
        // if($request->input('special_id') == null){
        //     return back()->withInputs();
        // }
        if(!$db_doctor){
            $doctor = new Doctor;
            $doctor->user_id = auth()->user()->id;
            $doctor->special_id = $request->input('special_id');
            $doctor->degree = $request->input('degree');
            $doctor->details = $request->input('details');
            $doctor->save();
        }else{
            $doctor = auth()->user()->doctor;
            $doctor->special_id = $request->input('special_id');
            $doctor->degree = $request->input('degree');
            $doctor->details = $request->input('details');
            $doctor->save();
        }
        return redirect()->route('doctor.dashboard');
    }
    public function auth_profile() {
        return view('doctor.profile.authprofile');
    }
    public function auth_profile_update(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8'
        ]);
        //image validation
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(400, 400)->save(public_path('/images/user/'.$file_name));
        }
        else{
            $file_name = null;
        }

        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->image = $file_name;
        $user->save();
        return redirect()->route('doctor.dashboard')->with('warning', 'Successfully updated your profile');

    }
}
