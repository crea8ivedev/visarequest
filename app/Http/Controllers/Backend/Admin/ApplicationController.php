<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Models\Application;
use App\Models\ServiceInputAnswer;
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
        $page_breadcrumbs  = '';
        if ($request->ajax()) {
            $service = Application::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service = Application::whereHas('service', function($q) use($search)
                {
                    $q->where('name', 'LIKE', '%' . $search . '%');

                });
            
            }
            $data = $service->with(['service', 'service.staff', 'service.agent', 'user'])->latest()->get();
            //dd($data);
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="javascript:void(0);"  name="element" id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 view_application btn btn-sm btn-clean btn-icon" title="Add Input"><i class="fa fa-eye"></i></a> ';
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


    public function view(Request $request, $id) {

        $page_title   = 'Application';

        if(request()->ajax())
        {   
            $dataView = [];
            $serviceInputeAnswer = ServiceInputAnswer::findOrFail($id);
            $data = ServiceInputAnswer::where('service_id',$serviceInputeAnswer->service_id)->get()->toArray();
        
            foreach ($data as $element) {
                $dataView[$element['type']][] = $element;
            }
            //dd($dataView);
            $returnHTML = view('backend.admin.services.templete')->with('data',$dataView)->render();
            return response()->json(['success' => true, 'html' => $returnHTML]);
        }

    }
}
