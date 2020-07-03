<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\LoginRequest;
use Auth;
use Session;
use Config;
use Toastr;

class ProcessorLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:processor', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
      return view('backend.auth.processor-login');
    }

    public function login(LoginRequest $request)
    {
      if (Auth::guard('processor')->attempt(['email' => $request->email, 'role' => Config::get('constants.roles.PROCESSOR'), 'password' => $request->password], $request->remember)) {

        $user = Auth::guard('processor')->user();

        if ($user->status == 1) {

         Toastr::success('Welcome back! <strong>' . $user->first_name. ' '. $user->first_name  .'</strong>','', Config::get('constants.toster'));
         return redirect()->intended(route('processor.dashboard'));

        } else {

           Session::flash('message', 'This account has not been activated yet! Please contact your Administrator!');
           Session::flash('alert-class', 'alert-danger');
           Auth::guard('processor')->logout();
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
        Auth::guard('processor')->logout();
        Session::flash('message', 'You are successfully logout.!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/processor/login');
    }
}
