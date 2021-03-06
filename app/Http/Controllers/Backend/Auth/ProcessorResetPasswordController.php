<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Password;
use Auth;

class ProcessorResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/processor';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:processor');
    }

    protected function guard()
    {
      return Auth::guard('processor');
    }

    protected function broker()
    {
      return Password::broker('processors');
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('backend.auth.passwords.reset-processor')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }
}
