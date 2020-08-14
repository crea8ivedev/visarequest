<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\ProfileRequest;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceApplication;
use DataTables;
use Toastr;
use Config;
use Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title         = 'Profile';
        $user = Auth::user();
        return view('frontend.user.profile', compact('page_title', 'user'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request)
    {
        $user = user::findOrFail($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($user->password) {
            $user->password = Hash::make($request->password);
        }
        if ($user->save()) {
            return redirect()->back()->with('success', 'Profile update successfully.');
        } else {
            return redirect()->back()->with('error', 'Profile does not update successfully.');
        }
    }

    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function services(Request $request)
    {
        $page_title         = 'My Services';
        $user = Auth::user();
        $services = ServiceApplication::where('user_id', $user->id)
            ->with('service')
            ->get();;
        return view('frontend.user.service', compact('page_title', 'services'));
    }


    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicesDetails(Request $request)
    {
        $page_title         = 'My Services';
        $service = ServiceApplication::findOrFail($request->id)
            ->with('service')
            ->with('service.category')
            ->with('service.staff')
            ->first();
        return view('frontend.user.service-details', compact('page_title', 'service'));
    }
}
