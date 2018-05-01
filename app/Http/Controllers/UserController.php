<?php

namespace App\Http\Controllers;

use App\User;
use App\Shipping;
use Illuminate\Http\Request;
use App\Traits\CaptchaTrait;
use App\Http\Requests;
use Auth;
use Session;

class UserController extends Controller
{
    use CaptchaTrait;
    
    // sign up view
    public function getSignup() {
        return view ('user.signup');
    }
    
//    protected function validator(array $data)
//{
// 
//    // call the verifyCaptcha method to see if Google approves
//    $data['captcha-verified'] = $this->verifyCaptcha($data['g-recaptcha-response']);
//     
//    $validator = Validator::make($data,
//        [
//            'fName' => 'required|alpha',
//            'lName' => 'required|alpha',
//            'email' => 'required|email|unique:users',
//            'password' => 'required|min:4|alpha_num'
////            'g-recaptcha-response' => 'required|captcha',
////            'captcha-verified' => 'required|min:1'
//        ],
//        [
////            'g-recaptcha-response.required' => 'Please confirm that you are not a robot',
////            'captcha-verified.min' => 'reCaptcha verification failed'
//        ]
//    );
// 
////    return $validator;
//}
    
    // add sign up info to database
    public function postSignup(Request $request) {
//        $request['g-recaptcha-response'] = $this->captchaCheck();
        $this->validate($request, [
            'fName' => 'required|alpha',
            'lName' => 'required|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|alpha_num'
//            'g-recaptcha-response'  => 'required|captcha',
//            'captcha' => 'required|min:1'
        ],
        [
//            'g-recaptcha-response.required' => 'Captcha is required',
//            'captcha.min' => 'Wrong captcha, please try again.'
        ]);
        
//        store user to database
        $user = new User([
            'fName' => $request->input('fName'),
            'lName' => $request->input('lName'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        
//        login the new user
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
            'password' => 'required|min:4|alpha_num'
        ]);
        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if (Session::has('oldUrl')) {
                $oldUrl = Session::get('oldUrl');
                Session::forget('oldUrl');
                return redirect($oldUrl); // fix this redirect
            } 
            return redirect('my-account')->with('success', 'You are now logged in to your account!');
        }
        return redirect()->back()->withInput()->withErrors(['These credentials do not match our records.']);
    }
    
    // user account view
    public function getAccount() {
        $user = Auth::user();
        return view('user.user-info')->with('user', $user);
    }
    
//    edit form for user info
    public function editInfo($id) {
        $user = User::find($id);
        return view('user.edit-info', compact('user', 'id'));
    }
    
//    update user info
    public function updateInfo(Request $request, $id) {
        $user = User::find($id);
        $this->validate(request(), [
            'fName' => 'required|alpha',
            'lName' => 'required|alpha',
            'email' => 'email|required'
        ]);
        $user->fName = $request->input('fName');
        $user->lName = $request->input('lName');
        $user->email = $request->input('email');
        $user->save();
        return redirect('my-account')->with('success', 'Account infomation has been updated!');
    }
    
//    get user orders
    public function getAccountOrders() {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key) {
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.user-orders', ['orders' => $orders]);
    }
    
    // logout the user
    public function getLogout() {
        Auth::logout();
        return redirect()->route('index')->with('success', 'You have successfully logged out of your account!');
    }
    
    // unauthorized access error page
    public function unauthorized() {
        return view('errors.unauthorized');
    }
    
    // ADMIN ONLY
    // display all users for admin
    public function getUsers() {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $users = User::all();
            return view('user.manage-users')->with('users', $users);
        } else {
            return view('errors.unauthorized');
        }
    }
    
    // edit the selected user info
    public function editUser($id)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $user = User::find($id);
            return view('user.edit-user', compact('user', 'id'));
        } else {
            return view('errors.unauthorized');
        }
    }
    
    // update selected user info with database and validate fields
    public function updateUser(Request $request, $id)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $user = User::find($id);
            $this->validate(request(), [
                'fName' => 'required|alpha',
                'lName' => 'required|alpha',
                'email' => 'email|required',
                'role' => 'required'
            ]);
            $user->fName = $request->input('fName');
            $user->lName = $request->input('lName');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->save();
            return redirect('manage-users')->with('success', 'User has been updated!');
        } else {
            return view('errors.unauthorized');
        }
    }
    
    // delete user
    public function deleteUser($id)
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            $user = User::find($id);
            $user->delete();
            return redirect('manage-users')->with('success', 'User has been deleted');
        } else {
            return view('errors.unauthorized');
        }
    }
}
