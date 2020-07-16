<?php

namespace App\Http\Controllers\Frontend\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\Frontend\SignupRequest;
use Config;
use Response;
use Auth;

class SignupController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(SignupRequest $request)
    {
        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->status = 1;
        $user->role = Config::get('constants.ROLES.USER');
        $user->password = Hash::make($request->password);

        if ($user->save()) {
            return response()->json([
                'status' => true,
                'user_id' => $user->id,
                'message' => 'You have successfully signup.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'You have not successfully signup!'
            ]);
        }
        Auth::login($user);
    }
}
