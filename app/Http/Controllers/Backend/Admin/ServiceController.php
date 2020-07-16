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
use App\Models\ServiceCountry;
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
        $page_breadcrumbs  = '';
        if ($request->ajax()) {
            $service = Service::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service->where('name', 'LIKE', '%' . $request->search . '%');
                // ->orWhere('last_name', 'LIKE', '%' . $request->search . '%');
            }
            $data = $service->with(['countrys.country', 'staff', 'agent'])->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/service/edit/' . $data->id . '"  name="edit" id="' . $data->id . '" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a> ';
                    $button .= '<a href="javascript:;" name="delete" id="' . $data->id . '" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i><a/> ';
                    $button .= '<a href="/admin/service/element/' . $data->id . '"  name="element" id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Add Input"><i class="la la-plus"></i></a> ';
                    return $button;
                })
                ->editColumn('country', function ($data) {
                    return $data->countrys->map(function ($countrys) {
                        return $name = $countrys->country->name;
                    })->implode(', ');
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
        $page_breadcrumbs   = array(['page' => 'admin/service', 'title' => 'Services'], ['page' => 'admin/service/add', 'title' => 'Add']);
        $country_list        = Country::latest()->get();
        $staff_list          = User::where('role', Config::get('constants.ROLES.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.ROLES.AGENT'))->latest()->get();
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
        $service->save();
        $insertedId = $service->id;
        $countrys = $request->country_id;

        //Multiple insert service country
        foreach ($countrys as $country) {
            ServiceCountry::create([
                'country_id'    => $country,
                'service_id'    => $insertedId,
            ]);
        }

        if ($service) {
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
        $page_breadcrumbs   = array(['page' => 'admin/service', 'title' => 'Services'], ['page' => 'admin/service/edit/' . $id . '', 'title' => 'Edit']);
        $country_list       = Country::latest()->get();
        $category_list      = ServiceCategory::get();
        $selected_country   = ServiceCountry::where('service_id', $id)->get()->toArray();
        $selected_country   = array_column($selected_country, 'country_id');

        $staff_list         = User::where('role', Config::get('constants.ROLES.PROCESSOR'))->latest()->get();
        $agent_list         = User::where('role', Config::get('constants.ROLES.AGENT'))->latest()->get();
        return view('backend.admin.services.edit', compact('data', 'category_list', 'country_list', 'staff_list', 'agent_list', 'page_title', 'page_description', 'page_breadcrumbs', 'selected_country'));
    }

    public function createElement(Request $request, $id)
    {
        $page_title         = 'Service input';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/service', 'title' => 'Services'], ['page' => 'admin/service/element/' . $id . '', 'title' => 'Service input']);
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
        ServiceCountry::where('service_id', $id)->delete();
        $countrys = $request->country_id;
        //Multiple insert service country
        foreach ($countrys as $country) {
            ServiceCountry::create([
                'country_id'    => $country,
                'service_id'    => $id,
            ]);
        }

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
