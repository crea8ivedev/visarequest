<?php

namespace App\Http\Controllers\Processor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;

class ProcessorController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:processor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = 'Dashboard';
        $page_description = 'Some description for the page';

        return view('backend.processor.dashboard', compact('page_title', 'page_description'));
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $page_title = 'Profile';
        $page_breadcrumbs  = array (['page' => 'processor', 'title' => 'Dashboard']);
        $user = User::find(auth()->user()->id);
        return view('backend.processor.profile.list', compact('page_title','user', 'page_breadcrumbs' ));
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
                    'first_name'    => 'required',
                    'last_name'     => 'required',
                    'phone_number'  => 'required',
                    'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->withErrors($validator);
        } else {
            try {
                $photos_path = public_path('/images/uploads/profile/');
                $user = User::find(auth()->user()->id);
                $user->first_name = $data['first_name'];
                $user->last_name = $data['last_name'];
                $user->phone_number = $data['phone_number'];
                $user->address = $data['address'];
//                $user->zipcode = $data['zipcode'];
//                $user->city_id = $data['city_id'];
//                $user->state_id = $data['state_id'];
//                $user->country_id = $data['country_id'];
                if ($request->hasFile('profile_image')) {
                    $image = $request->file('profile_image');
                    $save_name = time().'.'.$image->getClientOriginalExtension();
                    $image->move($photos_path, $save_name);
                    $user->profile_image = $save_name;
                }
                $user->save();
                 Session::flash('message', 'Profile successfully updated.');
                 Session::flash('alert-class', 'alert-success');
                 return redirect()->intended(route('admin.profile'));
               
            } catch (Exception $ex) {
                 Session::flash('message', 'Something went wrong, please try again.');
                 Session::flash('alert-class', 'alert-danger');
                return redirect()->intended(route('processor.profile'));
                
            }
        }
    }

    public function showChangePasswordForm(){
        $page_title = 'Change Password';
        $page_breadcrumbs  = array (['page' => 'processor', 'title' => 'Dashboard']);
        $user = User::find(auth()->user()->id);
        return view('backend.processor.profile.change-password',compact('page_title','user', 'page_breadcrumbs' ));
    }

    public function changePassword(Request $request) {
        
        $data = $request->all();
        $validator = Validator::make($data, [
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return back()
            ->withInput()
            ->withErrors($validator);
        }

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }



        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password changed successfully !");

    }

}
