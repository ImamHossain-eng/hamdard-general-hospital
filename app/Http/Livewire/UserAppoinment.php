<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Special;
use App\Models\Doctor;
use App\Models\Appoinment;
// use App\Models\Schedule;

class UserAppoinment extends Component
{

    public $special_id;
    public $doctor_id;
    public $schedule_id;

    public $doctors;
    public $schedules;


    public function loadDoctors(){
        $this->doctors = Special::find($this->special_id)->doctors;    
    }

    public function loadSchedules(){
        $this->schedules = Doctor::find($this->doctor_id)->schedules;    
    }

    public function saveAppointment(){
        if($this->doctor_id && $this->schedule_id){
            $app = new Appoinment;
            $app->user_id = auth()->user()->id;
            $app->doctor_id = $this->doctor_id;
            $app->schedule_id = $this->schedule_id;
            $app->save();
            return redirect()->route('user.appoinment.index')->with('success', 'Appointment requested successfully.');
        }
        // Appoinment::create([
        //     'user_id' => auth()->user()->id,
        //     'doctor_id' => $this->doctor_id,
        //     'date' => $this->date
        // ]);
        
    }

    public function render()
    {
        return view('livewire.user-appoinment', ['specials' => Special::all()]);
    }
}
