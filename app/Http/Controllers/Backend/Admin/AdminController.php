<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Session;
use Auth;
use Toastr;
use Config;
use App\Http\Requests\Backend\AdminRequest;
use DataTables;
use App\Services\StatisticsService;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
     /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Admin';
            $page_description  = '';
            $page_breadcrumbs  = array (['page' => 'admin', 'title' => 'Dashboard']);

            if($request->ajax())
            {
                $users = User::where('role',Config::get('constants.roles.ADMIN'));

                // Search for a services based on their name.
                if ($request->has('search') && ! is_null($request->get('search'))) {
                    $search = $request->get('search');
                    $users->where(function($query) use ($search) {
                       $query->orWhere('first_name', 'LIKE', '%' . $search . '%');
                       $query->orWhere('last_name', 'LIKE', '%' . $search . '%');
                       $query->orWhere('email', 'LIKE', '%' . $search . '%');
                    });
                }

                $data = $users->latest()->get();
                return DataTables::of($data)
                    ->addColumn('action', function($data) {
                        $button = '<a href="/admin/admin/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
                        ';
                        $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';

                        $button .= '<input data-switch="true" id="'.$data->id.'" type="checkbox" checked="checked"  />';
                        return $button;
                    })
                    ->editColumn('last_login_at', function($data) {
                       $date = $data->last_login_at;
                       if ($date != null) {
                         return date('d-M-Y h:i A', strtotime($date));
                       } else {
                        return '-';
                        
                       }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('backend.admin.admin.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {   
        $page_title         = 'Admin';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'admin/admin', 'title' => 'Admin List']);

        return view('backend.admin.admin.add', compact('page_title', 'page_description', 'page_breadcrumbs'));

    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {   
        $user             = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->status     = $request->status;
        $user->role       = Config::get('constants.roles.ADMIN');
        $user->password   = Hash::make($request->password);

       if($user->save()) {
        
        Toastr::success('Admin add successfully!','', Config::get('constants.toster'));
        return redirect('/admin/admin');

       } else {
        Toastr::success('Admin dose not add!','', Config::get('constants.toster'));
        return redirect('/admin/admin/add');
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data               = User::findOrFail($id);
        $page_title         = 'Admin';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'admin/admin', 'title' => 'Admin List']);

        return view('backend.admin.admin.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request)
    {
       
        $user             = User::findOrFail($request->hidden_id);
        $user->id         = $request->hidden_id;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->status     = $request->status;

        if ($request->password != '') {
            $user->password   = Hash::make($request->password);
        }

       if($user->save()) {
            Toastr::success('Admin updated successfully!','', Config::get('constants.toster'));
            return redirect('/admin/admin');
       } else {
            Toastr::error('Admin  dose not update!','', Config::get('constants.toster'));
            return redirect('/admin/admin/edit');
       }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::findOrFail($id);

       if($user->delete()) {
         return response()->json(['success' => 'Admin delete successfully!']);
       } else {
         return response()->json(['success' => 'Admin dose not delete!']);
       }
    }


    /**
     * Show the application profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $page_title = 'Profile';
        $page_breadcrumbs  = array (['page' => 'admin', 'title' => 'Dashboard']);
        $user = User::find(auth()->user()->id);
        return view('backend.admin.profile.list', compact('page_title','user', 'page_breadcrumbs' ));
    }

    /**
     * Show the application profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request) {
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
                return redirect()->intended(route('admin.profile'));
                
            }
        }
    }

    public function showChangePasswordForm(){
        $page_title = 'Change Password';
        $page_breadcrumbs  = array (['page' => 'admin', 'title' => 'Dashboard']);
        $user = User::find(auth()->user()->id);
        return view('backend.admin.profile.change-password',compact('page_title','user', 'page_breadcrumbs' ));
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
