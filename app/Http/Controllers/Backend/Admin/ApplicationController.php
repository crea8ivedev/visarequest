<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceAssign;
use App\Models\ServiceElement;
use App\Models\User;
use App\Models\Country;
use App\Models\ServiceCategory;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Config;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $page_title        = 'Applications';
        $page_description  = '';
        $page_breadcrumbs  = array(['page' => 'admin', 'title' => 'Dashboard']);
        if ($request->ajax()) {
            $service = ServiceAssign::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service = ServiceAssign::whereHas('service', function($q) use($search)
                {
                    $q->where('name', 'LIKE', '%' . $search . '%');

                });
            
            }
            $data = $service->with(['service','service.country', 'service.staff', 'service.agent', 'user'])->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '-';
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
        $user_list          = User::where('role', Config::get('constants.roles.USER'))->latest()->get();
        $staff_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.roles.AGENT'))->latest()->get();
        $service_list       = Service::get();
        return view('backend.admin.application.add', compact('page_title', 'service_list', 'user_list', 'page_description', 'page_breadcrumbs', 'staff_list', 'agent_list'));
    }
}
