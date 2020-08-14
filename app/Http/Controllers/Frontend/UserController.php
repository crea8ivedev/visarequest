<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\ProfileRequest;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceApplication;
use App\Models\ServiceAplicationConversion;
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
        if ($request->password) {
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
        $user = Auth::user();
        $page_title        = 'My Applications';
        $page_description  = '';
        $page_breadcrumbs  = '';
        $applications = ServiceApplication::query();
        $applications->where('user_id', $user->id);
        if ($request->ajax()) {
            if ($request->has('searchByStatus') && !is_null($request->get('searchByStatus'))) {
                $search = $request->get('searchByStatus');
                if ($search === 'processing') {
                    $applications->where('status', Config::get('constants.SERVICE_APPLICATION_STATUS.PROCESSING'));
                } elseif ($search === 'completed') {
                    $applications->where('status', Config::get('constants.SERVICE_APPLICATION_STATUS.COMPLETED'));
                } elseif ($search === 'cancel') {
                    $applications->where('status', Config::get('constants.SERVICE_APPLICATION_STATUS.CANCEL'));
                }
            }
            $data = $applications->with(['service', 'service.staff', 'service.category', 'service.agent', 'user'])->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/application-details/' . $data->id . '"     data-id="' . $data->id . '" class="btn btn-primary " title="view application details"><i class="fa fa-info"></i></a> ';
                    $button .= '<a href="javascript:void(0);"   data-id="' . $data->id . '" class="btn btn-info reply_application_btn" title="Edit Application"><i class="fa fa-envelope"></i></a> ';
                    return $button;
                })
                ->editColumn('application_applied_date', function ($data) {
                    return date('d-m-Y');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.user.application', compact('page_title', 'page_description', 'page_breadcrumbs', 'applications'));
    }


    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicesDetails(Request $request)
    {
        $user = Auth::user();
        $page_title        = 'My Applications';
        $page_description  = '';
        $page_breadcrumbs  = '';
        $applications = ServiceApplication::findOrFail($request->id)->with('service')->first();
        $applicationsConversion = ServiceAplicationConversion::query();
        $applicationsConversion->where('application_id', $request->id);
        if ($request->ajax()) {
            $data = $applicationsConversion->with(['service', 'service.staff', 'service.category', 'service.agent', 'user'])->latest()->get();
            return DataTables::of($data)
                ->editColumn('FullName', function ($data) {
                    return $data->user->FullName;
                })
                ->editColumn('attechment', function ($data) {
                    return '-';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.user.application-details', compact('page_title', 'page_description', 'page_breadcrumbs', 'applications', 'applicationsConversion'));
    }

    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function messages(Request $request)
    {
        $user = Auth::user();
        $page_title        = 'My Applications';
        $page_description  = '';
        $page_breadcrumbs  = '';
        $applications = ServiceApplication::where('user_id', $user->id)->with('service')->get();
        $applicationsConversion = ServiceAplicationConversion::query();
        $applicationsConversion->where('user_id', $user->id);
        if ($request->ajax()) {
            $data = $applicationsConversion->with(['service', 'service.staff', 'service.category', 'service.agent', 'user'])->latest()->get();
            return DataTables::of($data)
                ->editColumn('FullName', function ($data) {
                    return $data->user->FullName;
                })
                ->editColumn('attechment', function ($data) {
                    return '-';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('frontend.user.messages', compact('page_title', 'page_description', 'page_breadcrumbs', 'applications', 'applicationsConversion'));
    }



    public function replyApplication(Request $request, $id)
    {
        if (request()->ajax()) {
            $service = ServiceApplication::with(['service', 'serviceApplicationConversion', 'user'])->findOrFail($request->id)->first();
            $returnHTML = view('backend.admin.application.application-reply')->with('service', $service)->render();
            return response()->json(['success' => true, 'html' => $returnHTML]);
        }
    }



    public function replyUpdateApplication(Request $request)
    {
        $appConversion = new ServiceAplicationConversion;
        $appConversion->service_id = $request->service;
        $appConversion->application_id = $request->application;
        $appConversion->subject = $request->subject;
        $appConversion->message = $request->message;
        $appConversion->user_id = Auth::user()->id;
        $appConversion->date = date("Y-m-d h:i:s");
        $appConversion->type = 'USER';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $save_name = date("Ymdhis") . rand(5, 15) . '.' . $file->getClientOriginalExtension();
            $file->storeAs(Config::get('constants.DOCUMENTS.APPLICATION_DOCUMENT'), $save_name);
            $appConversion->file = $save_name;
        }
        if ($appConversion->save()) {
            return response()->json(['success' => true, 'message' => 'Message send successfull']);
        } else {
            return response()->json(['success' => false, 'message' => 'Message does not send successfull']);
        }
    }
}
