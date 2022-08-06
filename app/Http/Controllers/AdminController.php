<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Notifications\AppoinmentPaid;


use App\Models\Role;
use App\Models\User;
use App\Models\Message;
use App\Models\Special;
use App\Models\Doctor;
use App\Models\Appoinment;
use App\Models\Payment;

use Carbon\Carbon;

class AdminController extends Controller
{
    public function changeUserLoginDate($id) {
        $user = User::find($id);
        $user->last_login = Carbon::now();
        $user->save();
    }
    public function home(){
        $this->changeUserLoginDate(auth()->user()->id);
        return view('admin.home');
    }
    public function role_index(){
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }
    public function role_store(Request $request){
        $this->validate($request, ['name'=>'required|string|max:191']);
        $role = new Role;
        $role->name = $request->input('name');
        $role->save();
        return redirect()->route('admin.role.index')->with('success', 'Successfully Inserted.');
    }
    public function role_edit($id){
        $role = Role::find($id);
        return view('admin.role.edit', compact('role'));
    }
    public function role_update(Request $request, $id){
        $this->validate($request, ['name'=>'required|string|max:191']);
        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();
        return redirect()->route('admin.role.index')->with('success', 'Successfully Updated.');
    }
    public function user_index($role_id){
        $users = User::where('role_id', $role_id)->paginate(10);
        return view('admin.user.index', compact('users'));
    }
    public function user_create(){
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }
    public function user_store(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        if($request->input('role_id') != 'null'){
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role_id = $request->input('role_id');
            $user->save();
            return redirect()->route('admin.user.index')->with('success', 'Successfully Inserted.');
        }else{
            return back()->withInput()->with('error', 'Please select user role.');
        }
    }
    public function user_destroy($id){
        User::find($id)->delete();
        return redirect()->route('admin.user.index')->with('error', 'Successfully Removed.');
    }
    public function user_edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }
    public function user_update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email'
        ]);

        $user = User::find($id);
        $oldPass = $user->password;

        if($request->input('password') != null){
            $password = bcrypt($request->input('password'));
        }else{
            $password = $oldPass;
        }

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $password;
        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('admin.user.index', $user->role_id)->with('warning', 'Successfully Updated.');
    }
    public function message_index() {
        $messages = Message::latest()->paginate(10);
        return view('admin.message.index', compact('messages'));        
    }
    public function message_show($id) {
        $message = Message::find($id);
        if($message->seen != true){
            $message->seen = true;
            $message->save();
        }
        return view('admin.message.show', compact('message'));
    }
    public function message_destroy($id) {
        Message::find($id)->delete();
        return redirect()->route('admin.message.index')->with('error', 'Successfully removed.');       
    }
    public function speciality_index(){
        $specials = Special::all();
        return view('admin.special.index', compact('specials'));
    }
    public function speciality_store(Request $request){
        $this->validate($request, [
            'speciality' => 'required|string|max:191'
        ]);
        $getMaxPos = Special::max('position');
        $special = new Special;
        $special->speciality = $request->input('speciality');
        $special->position = $getMaxPos+1;
        $special->save();
        return redirect()->route('admin.speciality.index')->with('success', 'Successfully Created');
    }
    public function doctor_index(){
        $doctors = Doctor::latest()->paginate(10);
        return view('admin.doctor.index', compact('doctors'));
    }
    public function doctor_show($id){
        $doctor = Doctor::find($id);
        return view('admin.doctor.show', compact('doctor'));
    }
    public function appointments_index(){
        $appointments = Appoinment::latest()->paginate(10);
        return view('admin.appointment.index', compact('appointments'));
    }
    public function appointments_update_status($id){
        //get the appointment
        $app = Appoinment::find($id);
        if($app->payment == true){
            //Change Status
            
            $app->check = true;
            $app->save();
            //Confirm Payment 
            $payment = $app->payment_relation;
            $payment->status = true;
            $payment->save();
            //Send Notification to the user
            $user = $app->user;
            $user->notify(new AppoinmentPaid());
            
            return redirect()->route('admin.appointment.index')->with('warning', 'Appointment Confirmed.');
        }
        
    }
    public function appointments_show($id){
        $app = Appoinment::find($id);
        return view('admin.appointment.show', compact('app'));
    }
    public function payment_index(){
        $payments = Payment::latest()->paginate(10);
        return view('admin.payment.index', compact('payments'));
    }

}
