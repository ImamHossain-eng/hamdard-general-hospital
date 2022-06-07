<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Special;
use App\Models\Appoinment;

class UserAppoinment extends Component
{
    
    public $doctors;
    public $special_id;
    public $doctor_id;
    public $date;


    public function loadDoctors(){
        $this->doctors = Special::find($this->special_id)->doctors;    
    }

    public function saveAppointment(){
        // Appoinment::create([
        //     'user_id' => auth()->user()->id,
        //     'doctor_id' => $this->doctor_id,
        //     'date' => $this->date
        // ]);
        $app = new Appoinment;
        $app->user_id = auth()->user()->id;
        $app->doctor_id = $this->doctor_id;
        $app->date = $this->date;
        $app->save();
        return redirect()->route('user.appoinment.index')->with('success', 'Appointment requested successfully.');
    }

    public function render()
    {
        return view('livewire.user-appoinment', ['specials' => Special::all()]);
    }
}
