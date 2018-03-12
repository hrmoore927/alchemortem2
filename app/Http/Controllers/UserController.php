<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use Session;

class UserController extends Controller
{
    // sign up view
    public function getSignup() {
        return view ('user.signup');
    }
    
    // add sign up info to database
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
        
        if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect()->to($oldUrl);
            }
        
        return redirect()->route('my-account');
    }
    
    // sign in view
    public function getSignin() {
        return view('user.signin');
    }
    
    // validate sign in input
    public function postSignin(Request $request) {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);
        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect('checkout');
            }
            return redirect('my-account');
        }
        return redirect()->back();
    }
    
    // user account view
    public function getAccount() {
//        $user = User::find($id);
        return view('user.account');
    }
    
    // logout the user
    public function getLogout() {
        Auth::logout();
        return redirect()->route('index');
    }
    
    // display all users for admin
    public function getUsers() {
        $users = User::all();
        return view('user.manage-users')->with('users', $users);
    }
    
    // edit the selected user info
    public function editUser($id)
    {
        $user = User::find($id);
        return view('user.edit-user', compact('user', 'id'));
    }
    
    // update selected user info with database and validate fields
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $this->validate(request(), [
            'fName' => 'required',
            'lName' => 'required',
            'email' => 'email|required',
            'role' => 'required'
        ]);
        $user->fName = $request->input('fName');
        $user->lName = $request->input('lName');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->save();
        return redirect('manage-users')->with('success', 'User has been updated!');
    }
    
    // delete user
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('manage-users')->with('success', 'User has been deleted');
    }
}
