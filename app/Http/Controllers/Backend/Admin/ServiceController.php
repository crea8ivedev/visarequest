<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Models\ServiceInput;
use App\Models\User;
use App\Models\Country;
use App\Models\ServiceCategory;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Toastr;
use Config;

use function GuzzleHttp\json_encode;

class ServiceController extends Controller
{

    public function index(Request $request)
    {
        $page_title        = 'Services';
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
                    $button .= '<a href="javascript:;" name="delete" id="' . $data->id . '" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i><a/> ';
                    $button .= '<a href="/admin/service/element/' . $data->id . '"  name="element" id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Add Input"><i class="la la-plus"></i></a> ';
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
        return view('backend.admin.services.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {
        $page_title         = 'Service';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/agent', 'title' => 'Service']);
        $country_list        = Country::latest()->get();
        $staff_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.roles.AGENT'))->latest()->get();
        $category_list = ServiceCategory::get();
        return view('backend.admin.services.add', compact('page_title', 'category_list', 'page_description', 'page_breadcrumbs', 'country_list', 'staff_list', 'agent_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service             = new Service;
        $service->country_id = $request->country_id;
        $service->category_id = $request->category_id;
        $service->processor_id = $request->processor_id;
        $service->agent_id  = $request->agent_id;
        $service->name      = $request->name;
        $service->description      = $request->description;
        $service->normal_price      = $request->normal_price;
        $service->discount_price      = $request->discount_price;
        $service->commission      = $request->commission;
        $service->status     = $request->status;
        $service->slug =  Str::slug($request->name, '-');

        if ($service->save()) {
            Toastr::success('Service added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service');
        } else {
            Toastr::error('Service  dose not added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service/add');
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
        $data               = Service::findOrFail($id);
        $page_title         = 'Service';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/service', 'title' => 'Service']);
        $country_list          = Country::latest()->get();
        $category_list = ServiceCategory::get();
        $staff_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.roles.AGENT'))->latest()->get();
        return view('backend.admin.services.edit', compact('data', 'category_list', 'country_list', 'staff_list', 'agent_list', 'page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function createElement(Request $request, $id)
    {
        $page_title         = 'Service';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/agent', 'title' => 'Service']);
        $serviceElement          = Service::where('id', $id)->first();
        return view('backend.admin.services.element', compact('page_title', 'serviceElement', 'id', 'page_description', 'page_breadcrumbs'));
    }

    public function storeElement(Request $request)
    {
        $dataJson = $request->post('dataHdn');
        $data = json_decode($request->post('dataHdn'), true);
        $service = Service::find($request->post('serviceId'));
        $service->data = $dataJson;
        $service->save();
        $saveData = [];
        foreach ($data as $key => $value) {
            $saveData[] = array(
                'service_id' => $request->post('serviceId'),
                'type' => $value['type'],
                'required' => (isset($value['required']) ? $value['required'] : false),
                'label' => $value['label'],
                'value' => (isset($value['values'])) ? json_encode($value['values']) : '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            );
        }
        $serviceInputs = ServiceInput::where('service_id', $request->post('serviceId'))->pluck('id');
        $serviceElement = new ServiceInput;
        $serviceElement->whereIn('id', $serviceInputs)->delete();
        if ($serviceElement->insert($saveData)) {
            Toastr::success('Service element update successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service');
        } else {
            Toastr::error('Service element dose not update successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service             = Service::findOrFail($id);
        $service->country_id = $request->country_id;
        $service->category_id = $request->category_id;
        $service->processor_id = $request->processor_id;
        $service->agent_id  = $request->agent_id;
        $service->name      = $request->name;
        $service->description      = $request->description;
        $service->normal_price      = $request->normal_price;
        $service->discount_price      = $request->discount_price;
        $service->commission      = $request->commission;
        $service->status     = $request->status;
        $service->slug =  Str::slug($request->name, '-');
        if ($service->save()) {
            Toastr::success('Service updated successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service');
        } else {
            Toastr::error('Service  dose not update successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/service');
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
        $service = Service::findOrFail($id);
        if ($service->delete()) {
            return response()->json(['success' => 'Service deleted successfully.']);
        } else {
            return response()->json(['success' => 'Service dose not deleted successfully.']);
        }
    }
}
