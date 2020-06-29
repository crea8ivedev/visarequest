<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

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

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('processor')->attempt(['email' => $request->email, 'role' => '2', 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        Session::flash('message', 'You are successfully login!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->intended(route('processor.dashboard'));
      }

      Session::flash('message', 'These credentials do not match our records.!');
      Session::flash('alert-class', 'alert-danger');

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('processor')->logout();
        Session::flash('message', 'You are successfully logout.!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/processor/login');
    }
}
