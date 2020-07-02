<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use App\Models\User;
use App\Models\Country;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Config;

class ServiceController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title        = 'Service';
        $page_description  = '';
        $page_breadcrumbs  = array(['page' => 'admin', 'title' => 'Dashboard']);
        if ($request->ajax()) {
            $service = Service::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service->where('name', 'LIKE', '%' . $request->search . '%');
                // ->orWhere('last_name', 'LIKE', '%' . $request->search . '%');
            }
            $data = $service->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/service/edit/' . $data->id . '"  name="edit" id="' . $data->id . '" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a> ';
                    $button .= '<a href="javascript:;" name="delete" id="' . $data->id . '" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i>';
                    return $button;
                })
                ->editColumn('last_login_at', function ($data) {
                    $date = $data->last_login_at;
                    return date('M-d-Y h:i A', strtotime($date));
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
        $page_breadcrumbs   = array(['page' => 'admin/agent', 'title' => 'Service List']);
        $country_list        = Country::latest()->get();
        $staff_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        return view('backend.admin.services.add', compact('page_title', 'page_description', 'page_breadcrumbs', 'country_list', 'staff_list', 'agent_list'));
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
        $service->processor_id = $request->processor_id;
        $service->agent_id  = $request->agent_id;
        $service->name      = $request->name;
        $service->description      = $request->description;
        $service->normal_price      = $request->normal_price;
        $service->discount_price      = $request->discount_price;
        $service->commission      = $request->commission;
        $service->status     = $request->status;
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
        $page_breadcrumbs   = array(['page' => 'admin/service', 'title' => 'Service List']);
        $country_list          = Country::latest()->get();
        $staff_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        $agent_list          = User::where('role', Config::get('constants.roles.PROCESSOR'))->latest()->get();
        return view('backend.admin.services.edit', compact('data', 'country_list', 'staff_list', 'agent_list', 'page_title', 'page_description', 'page_breadcrumbs'));
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
        $service->processor_id = $request->processor_id;
        $service->agent_id  = $request->agent_id;
        $service->name      = $request->name;
        $service->description      = $request->description;
        $service->normal_price      = $request->normal_price;
        $service->discount_price      = $request->discount_price;
        $service->commission      = $request->commission;
        $service->status     = $request->status;
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
            return response()->json(['success' => 'Service delete successfully.']);
        } else {
            return response()->json(['success' => 'Service dose not delete successfully.']);
        }
    }
}
