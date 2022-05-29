<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ProfileUpdateRequest;

use Image;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $file_name = time().'.'.$extension;
            Image::make($file)->resize(400, 400)->save(public_path('/images/user/'.$file_name));
        }
        else{
            $file_name = null;
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $file_name
        ]);

        return redirect()->back()->with('success', 'Profile updated.');
    }
}
