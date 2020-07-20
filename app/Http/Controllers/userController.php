<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

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

        ]);

        $user = new User();
        $user -> name = request('name');
        $user -> email = request('email');
        $user -> password = request('password');
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
            'name' => 'required|unique:users',
            'email' => 'email:rfc,dns',
            'password' => 'required',

        ]);
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
