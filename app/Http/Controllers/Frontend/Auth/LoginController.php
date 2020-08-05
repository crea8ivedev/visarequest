<?php

namespace App\Http\Controllers\Frontend\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LoginRequest;
use Config;
use Auth;

class LoginController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout']]);
    }


    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['role' => Config::get('constants.ROLES.USER'), 'email' => $request->email, 'password' => $request->password])) {
            return response()->json(['status' => true, 'message' => 'Login Successfully.']);
        } else {
            return response()->json(['status' => false, 'message' => 'Please enter valid email and password.']);
        }
    }

    public function logout()
    {
        Auth::guard('web')->logout();
        return redirect('/');
    }
}
