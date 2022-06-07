<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Special;

class UserAppoinment extends Component
{
    public $special;
    public $doctors;

    public function render()
    {
        return view('livewire.user-appoinment', ['specials' => Special::all()]);
    }
}
