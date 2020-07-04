<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use Auth;
use App\User;
use Session;
use Carbon\Carbon;
use Config;
use Toastr;

class AdminLoginController extends Controller
{
  public function __construct(){
    $this->middleware('guest:admin', ['except' => ['logout']]);
  }

  public function showLoginForm(){
    return view('backend.auth.admin-login');
  }


  public function login(LoginRequest $request){
    // Attempt to log the user in

    if (Auth::guard('admin')->attempt(['email' => $request->email, 'role' => Config::get('constants.roles.ADMIN')  , 'password' => $request->password], $request->remember)) {

      $user = Auth::guard('admin')->user();

      if ($user->status == 1) {

       Toastr::success('Welcome back! <strong>' . $user->first_name. ' '. $user->first_name  .'</strong>','', Config::get('constants.toster'));
       return redirect()->intended(route('admin.dashboard'));

      } else {

         Session::flash('message', 'This account has not been activated yet! Please contact your Administrator!');
         Session::flash('alert-class', 'alert-danger');
         Auth::guard('admin')->logout();
         return redirect()->back()->withInput();
      }

    } else {
      Session::flash('message', 'These credentials do not match our records.!');
      Session::flash('alert-class', 'alert-danger');
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

  }

  public function logout()
  {
    Auth::guard('admin')->logout();
    Session::flash('message', 'You have been successfully logged out!');
    Session::flash('alert-class', 'alert-success');
    return redirect('/admin/login');
  }
}
