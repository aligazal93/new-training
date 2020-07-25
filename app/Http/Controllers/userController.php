<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
class userController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $users = User::all();
        return view('users.index' , compact('users'));
    }
    public function create()
    {
        return view('users.create');
        
    }
    public function store(Request $request)
    {
        $users = User::all();
        $data = request()->validate([
            'name' => 'required|unique:users',
            'email' => 'email:rfc,dns',
            'password' => 'required',
            'image' => 'required|image',
        ]);

        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('uploads/users',$image_new_name);



        $user = new User();
        $user -> name = request('name');
        $user -> email = request('email');
        $user -> image = $image_new_name;
        $user -> password = Hash::make( request('password'));
        $user->save();
        return redirect('users');
    }
    public function show($id)
    {
        
    }

    public function edit(User $user)
    {
        $users = User::all();
        return view('users.edit', compact('user' ));
    }
    public function update(Request $request,User $user)
    {
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
        return redirect('users/'.$user->id )-> with('message' , 'Thank You . You ara Updated a user successfully' ); ;

    }
    public function destroy(User $user)
    {
        $user->delete();
        return redirect('users')
            -> with('message' , 'Thank You . You ara Deleting a user successfully' );

    }
}
