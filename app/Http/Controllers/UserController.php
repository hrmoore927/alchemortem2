<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

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
        
        Auth::login($user);
        
        return redirect()->route('my-account');
    }
    
    public function getUsers() {
        $users = User::all();
        return view('user.manage-users')->with('users', $users);
    }
    
    public function getSignin() {
        return view('user.signin');
    }
    
    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('my-account');
        }
        return redirect()->back();
    }
    
    public function getAccount() {
        return view('user.account');
    }
    
    public function getLogout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
