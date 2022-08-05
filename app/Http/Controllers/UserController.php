<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\User;
use App\Models\Appoinment;
use App\Models\App_test;

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
        // return $app;
    }
    public function user_appointment_treatment($id){
        $app = Appoinment::find($id);
        return view('user.appoinment.treatment', compact('app'));
    }
    public function user_appointment_treatment_update(Request $request, $id){

        $req_test = $request->input('test');
        if($req_test == "on"){
            $test = true;
        }else{
            $test = false;
        }

        $app = Appoinment::find($id);
        $app->patient_name = $request->input('patient_name');
        $app->patient_age = $request->input('patient_age');
        $app->patient_weight = $request->input('patient_weight');
        $app->test = $test;
        $app->save();
        
        if($test == true){
            return view('user.appoinment.test', compact('app'));
        }else{
            return redirect()->route('user.appoinment.index')->with('success', 'Successfully Created.');
        }
    }
    public function appointment_test(Request $request){
        
        if($request->hasFile('file')){
    		$fileName = time().'.'.$request->file->extension();
    		$request->file->move(public_path('files/patient/test'), $fileName);
    	}else{
            $fileName = 'No_PDF.pdf';
        }

        $test = new App_test;
        $test->appoinment_id = $request->appoinment_id;
        $test->file = $fileName;
        $test->save();
        return redirect()->route('user.appoinment.index')->with('success', 'Successfully Uploaded Test Documents');

    }
}
