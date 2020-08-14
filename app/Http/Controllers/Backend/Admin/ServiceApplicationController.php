<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceApplication;
use App\Models\ServiceInputAnswer;
use App\Models\ServiceElement;
use App\Models\ServiceAplicationConversion;
use App\Models\User;
use App\Models\Country;
use App\Models\ServiceCategory;
use Illuminate\Support\Facades\Storage;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Config;
use Auth;
use File;

class ServiceApplicationController extends Controller
{
    public function index(Request $request)
    {
        $page_title        = 'Applications';
        $page_description  = '';
        $page_breadcrumbs  = '';
        if ($request->ajax()) {
            $service = ServiceApplication::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service = ServiceApplication::whereHas('service', function ($q) use ($search) {
                    $q->where('name', 'LIKE', '%' . $search . '%');
                });
            }
            $data = $service->with(['service', 'service.staff', 'service.category', 'service.agent', 'user'])->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0);"   data-id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 edit_application_btn btn btn-sm btn-clean btn-icon" title="Edit Application"><i class="fa fa-edit"></i></a> ';
                    $button .= '<a href="javascript:void(0);"    data-id="' . $data->id . '" class="btn btn-success btn-sm rounded-0 reply_application_btn btn btn-sm btn-clean btn-icon" title="view application details"><i class="fa fa-reply"></i></a> ';
                    $button .= '<a href="javascript:void(0);"    data-id="' . $data->id . '" class="btn btn-info warning-sm rounded-0 mark_application_btn btn btn-sm btn-clean btn-icon" title="view application details"><i class="fa fa-marker"></i></a> ';
                    $button .= '<a href="javascript:void(0);"    data-id="' . $data->id . '" class="btn btn-primary btn-sm rounded-0 view_application_btn btn btn-sm btn-clean btn-icon" title="view application details"><i class="fa fa-eye"></i></a> ';

                    return $button;
                })
                ->editColumn('userName', function ($data) {
                    return isset($data->user->FullName) ? $data->user->FullName : '';
                })
                ->editColumn('agentName', function ($data) {
                    return isset($data->agent->FullName) ? $data->agent->FullName : '';
                })->editColumn('staffName', function ($data) {
                    return isset($data->service->staff->FullName) ? $data->service->staff->FullName : '';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.admin.application.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {
        $page_title         = 'Application';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/agent', 'title' => 'Service']);
        $user_list          = User::where('role', Config::get('constants.ROLES.USER'))->latest()->get();
        $staff_list          = User::where('role', Config::get('constants.ROLES.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.ROLES.AGENT'))->latest()->get();
        $service_list       = Service::get();
        return view('backend.admin.service.application.add', compact('page_title', 'service_list', 'user_list', 'page_description', 'page_breadcrumbs', 'staff_list', 'agent_list'));
    }


    public function view(Request $request)
    {
        if (request()->ajax()) {
            $service = ServiceApplication::with(['service', 'user'])->findOrFail($request->id)->first();
            $returnHTML = view('backend.admin.application.application-details')->with('service', $service)->render();
            return response()->json(['success' => true, 'html' => $returnHTML]);
        }
    }

    public function edit(Request $request, $id)
    {
        if (request()->ajax()) {
            $service = ServiceApplication::with(['service', 'user'])->findOrFail($request->id)->first();
            $returnHTML = view('backend.admin.application.application-form')->with('service', $service)->render();
            return response()->json(['success' => true, 'html' => $returnHTML]);
        }
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
        $appConversion->type = 'SYSTEM';
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $save_name = date("Ymdhis") . rand(5, 15) . '.' . $file->getClientOriginalExtension();
            $file->storeAs(Config::get('constants.DOCUMENTS.APPLICATION_DOCUMENT'), $save_name);
            $appConversion->file = $save_name;
        }
        if ($appConversion->save()) {
            Toastr::success('Message send successfully!', '', Config::get('constants.toster'));
            return response()->json(['success' => true, 'message' => 'Message send successfull']);
        } else {
            Toastr::success('Message does not send successfully!!', '', Config::get('constants.toster'));
            return response()->json(['success' => true, 'message' => 'Message does not send successfull']);
        }
    }
}
