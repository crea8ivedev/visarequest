<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AgentLoginController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:agent', ['except' => ['logout']]);
    }

     public function showLoginForm()
    {
      return view('backend.auth.agent-login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('agent')->attempt(['email' => $request->email, 'role' => '3', 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        Session::flash('message', 'You are successfully login!');
        Session::flash('alert-class', 'alert-success');
        //dd('ok');
        return redirect()->intended(route('agent.dashboard'));
      }

      Session::flash('message', 'These credentials do not match our records.!');
      Session::flash('alert-class', 'alert-danger');

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('agent')->logout();
        Session::flash('message', 'You are successfully logout.!');
        Session::flash('alert-class', 'alert-success');
        return redirect('/agent/login');
    }
}
