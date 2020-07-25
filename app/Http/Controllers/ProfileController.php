<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class ProfileController extends Controller
{
    public function edit()
    {
        $user =  Auth::user();
        return view('profile.edit'  , compact('user'));

    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $data = request()->validate([
            'name' => 'required|unique:users,name,'.$user->id,
            'email' => 'email:rfc,dns',
            'password' => 'required',
        ]);

               
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/users',$image_new_name);
            $user -> image = $image_new_name;
            $user->save();
        }

        $user-> update($data);
        return view('profile.edit' , compact('user'));



    }

}
