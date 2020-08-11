<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceApplication;
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
            $data = $service->with(['service', 'service.staff', 'service.agent', 'user'])->latest()->get();
            //dd($data);
            return DataTables::of($data)
                ->addColumn('action', function ($data) {

                    // $button = '<a href="/admin/application/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>';
                    $button = '<a href="javascript:void(0);"  name="element" id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 view_application btn btn-sm btn-clean btn-icon" title="view application details"><i class="fa fa-eye"></i></a> ';
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


    public function view(Request $request, $id)
    {

        $page_title   = 'Application';

        if (request()->ajax()) {
            $dataView = [];
            $serviceInputeAnswer = ServiceInputAnswer::with(['service', 'user'])->findOrFail($id);
            $data = ServiceInputAnswer::where('service_id', $serviceInputeAnswer->service_id)->get()->toArray();

            foreach ($data as $element) {
                $dataView[$element['type']][] = $element;
            }
            $dataView['data'] = $serviceInputeAnswer;
            $returnHTML = view('backend.admin.services.templete')->with('data', $dataView)->render();
            return response()->json(['success' => true, 'data' => $serviceInputeAnswer, 'html' => $returnHTML]);
        }
    }

    public function edit(Request $request, $id)
    {

        $page_title   = 'Application';
        $page_breadcrumbs   = '';


        if (request()->ajax()) {
            $dataView = [];
            $serviceInputeAnswer = ServiceInputAnswer::with(['service', 'user'])->findOrFail($id);
            $data = ServiceInputAnswer::where('service_id', $serviceInputeAnswer->service_id)->get()->toArray();

            foreach ($data as $element) {
                $dataView[$element['type']][] = $element;
            }
            $dataView['data'] = $serviceInputeAnswer;

            $data = $serviceInputeAnswer;
            //dd($dataView);
            $returnHTML = view('backend.admin.templete')->with('data', $dataView)->render();
            return response()->json(['success' => true, 'data' => $serviceInputeAnswer, 'html' => $returnHTML]);
        }
    }
}
