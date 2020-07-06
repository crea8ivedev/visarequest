<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceElement;
use App\Models\User;
use App\Models\Country;
use App\Models\ServiceCategory;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Config;


class ServiceAssignController extends Controller
{
    public function index(Request $request)
    {
        $page_title        = 'Service Assign';
        $page_description  = '';
        $page_breadcrumbs  = array(['page' => 'admin', 'title' => 'Dashboard']);
        if ($request->ajax()) {
            $service = Service::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service->where('name', 'LIKE', '%' . $request->search . '%');
                // ->orWhere('last_name', 'LIKE', '%' . $request->search . '%');
            }
            $data = $service->with(['country', 'staff', 'agent'])->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/service/edit/' . $data->id . '"  name="edit" id="' . $data->id . '" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a> ';
                   // $button .= '<a href="javascript:;" name="delete" id="' . $data->id . '" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i><a/> ';
                    //$button .= '<a href="/admin/service/element/' . $data->id . '"  name="element" id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Add Input"><i class="la la-plus"></i></a> ';
                    return $button;
                })
                ->editColumn('agentName', function ($data) {
                    return isset($data->agent->FullName) ? $data->agent->FullName : '';
                })->editColumn('staffName', function ($data) {
                    return isset($data->staff->FullName) ? $data->staff->FullName : '';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('backend.admin.service_assign.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {
        $page_title         = 'Service Assign';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/agent', 'title' => 'Service']);
        $user_list          = User::where('role', Config::get('constants.roles.USER'))->latest()->get();
        $staff_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.roles.AGENT'))->latest()->get();
        $service_list       = Service::get();
        return view('backend.admin.service_assign.add', compact('page_title', 'service_list', 'user_list', 'page_description', 'page_breadcrumbs', 'staff_list', 'agent_list'));
    }
}
