<?php

namespace App\Http\Controllers\Backend\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LoginRequest;
use Auth;
use Session;
use Carbon\Carbon;
use Config;

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
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'role' => Config::get('constants.roles.ADMIN'), 'password' => $request->password], $request->remember)) {
      return redirect()->intended(route('admin.dashboard'));
    }

    Session::flash('message', 'These credentials do not match our records.!');
    Session::flash('alert-class', 'alert-danger');

    // if unsuccessful, then redirect back to the login with the form data
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  public function logout()
  {
    Auth::guard('admin')->logout();
    Session::flash('message', 'You have been successfully logged out!');
    Session::flash('alert-class', 'alert-success');
    return redirect('/admin/login');
  }
}
