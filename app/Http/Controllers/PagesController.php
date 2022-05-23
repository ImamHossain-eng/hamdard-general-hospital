<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class PagesController extends Controller
{
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
}
