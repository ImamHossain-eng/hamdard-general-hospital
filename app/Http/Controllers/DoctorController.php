<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Schedule;
use App\Models\Appoinment;

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
            'degree' => 'required|string',
            'details' => 'required|string',
        ]);

        $db_doctor = auth()->user()->doctor;
        if($request->input('special_id') != null){
            $special_id = $request->input('special_id');
        }else{
            $special_id = $db_doctor->special_id;
        }
        if(!$db_doctor){
            $doctor = new Doctor;
            $doctor->user_id = auth()->user()->id;
            $doctor->special_id = $request->input('special_id');
            $doctor->degree = $request->input('degree');
            $doctor->details = $request->input('details');
            $doctor->price = $request->input('price');
            $doctor->save();
        }else{
            $doctor = auth()->user()->doctor;
            $doctor->special_id = $special_id;
            $doctor->degree = $request->input('degree');
            $doctor->details = $request->input('details');
            $doctor->price = $request->input('price');

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
    public function schedule_index(){
        $schedules = auth()->user()->doctor->schedules;
        return view('doctor.schedule.index', compact('schedules'));
    }
    public function schedule_store(Request $request){
        $this->validate($request, [
            'day' => 'required',
            'start_time' => 'required',
            'end_time' => 'required'
        ]);
        if($request->input('day') != null){
            $schedule = new Schedule;
            $schedule->doctor_id = auth()->user()->doctor->id;
            $schedule->day = $request->input('day');
            $schedule->start_time = $request->input('start_time');
            $schedule->end_time = $request->input('end_time');
            $schedule->save();
            return redirect()->route('doctor.schedule.index')->with('success', 'Successfully added your Schedule.');
        }else{
            return back()->withInputs()->with('error', 'Please select working day.');
        }
    }
    public function schedule_destroy($id){
        Schedule::find($id)->delete();
        return redirect()->route('doctor.schedule.index')->with('error', 'Successfully Removed your Schedule.');
    }

    public function appointment_index(){
        $appointments = auth()->user()->doctor->appoinments;
        return view('doctor.appointment.index', compact('appointments'));
    }
    public function appointment_edit($id){
        $app = Appoinment::find($id);
        return view('doctor.appointment.edit', compact('app'));
    }
    public function appointment_update(Request $request, $id){
        $this->validate($request, ['prescription' => 'required']);
        $app = Appoinment::find($id);
        $app->prescription = $request->input('prescription');
        $app->save();
        return redirect()->route('doctor.appointment.index')->with('warning', 'Updated Prescription.');
    }
    public function appointment_show($id){
        $app = Appoinment::find($id);
        return view('doctor.appointment.show', compact('app'));
    }
}
