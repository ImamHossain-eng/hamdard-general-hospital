<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\User;
use App\Models\Message;

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
    public function user_index(){
        $users = User::latest()->paginate(10);
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

        return redirect()->route('admin.user.index')->with('warning', 'Successfully Updated.');
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
}
