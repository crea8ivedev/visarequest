<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Http\Requests\Frontend\ForgotPasswordRequest;
use Illuminate\Support\Str;
use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use Config;
use App\Models\User;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    public function sendPasswordResetToken(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->where('role', Config::get('constants.ROLES.USER'),)->first();
        if (!$user) return response()->json(['status' => false, 'message' => 'Email not found.']);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60), //change 60 to any length you want
            'created_at' => Carbon::now()
        ]);
        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();
        $token = $tokenData->token;
        $email = $request->email;
        Mail::to($email)->send(new SendEmail($token, $email, $user));
        return response()->json(['status' => true, 'message' => 'Email sent successfully in your account.']);
    }

    public function showPasswordResetForm(Request $request)
    {
        $tokenData = DB::table('password_resets')->where('token', $request->token)->first();
        if (!$tokenData) return redirect()->to('/'); //redirect them anywhere you want if the token does not exist.
        return view('auth.verify', compact('tokenData'));
    }
}
