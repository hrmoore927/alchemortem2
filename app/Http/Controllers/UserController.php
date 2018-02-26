<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    public function getSignup() {
        return view ('user.signup');
    }
    
    public function postSignup(Request $request) {
        $this->validate($request, [
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);
        
        $user = new User([
            'fName' => $request->input('fName'),
            'lName' => $request->input('lName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        
        return redirect()->route('index');
    }
    
    public function getUsers() {
        $users = User::all();
        return view('user.manage-users')->with('users', $users);
    }
}
