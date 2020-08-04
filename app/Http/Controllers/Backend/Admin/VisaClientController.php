<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\VisaClientRequest;
use App\Models\VisaClient;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
use Toastr;
use Config;

class VisaClientController extends Controller
{
    public function index(Request $request)
    {
        $page_title        = 'Visa Client';
        $page_description  = '';
        $page_breadcrumbs  = '';
        if ($request->ajax()) {
            $service = VisaClient::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service->where('title', 'LIKE', '%' . $request->search . '%');
            }
            $data = $service->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/visa-client/edit/' . $data->id . '"  name="edit" id="' . $data->id . '" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a> ';
                    $button .= '<a href="javascript:;" name="delete" id="' . $data->id . '" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i><a/>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.admin.visa-client.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {
        $page_title         = 'Client';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/Client', 'title' => 'Client'],['page' => 'admin/Client/add', 'title' =>'Add']);
        return view('backend.admin.visa-client.add', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisaClientRequest $request)
    {      

        $Client  = new VisaClient;
        $Client->title = $request->title;
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $save_name = $Client->title.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.VISA_CLIENT_IMAGE'), $save_name);
            $Client->file = $save_name;
        }
       if ($Client->save()) {
            Toastr::success('Visa Client  added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/visa-client');
        } else {
            Toastr::error('Visa Client   dose not added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/visa-client');
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
        $data               = VisaClient::findOrFail($id);
        $page_title         = 'Client';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/Client', 'title' => 'Client'],['page' => 'admin/Client/edit/'.$id.'', 'title' =>'Edit']);
        return view('backend.admin.visa-client.edit', compact('data', 'page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(VisaClientRequest $request, $id)
    {
        $Client  = VisaClient   ::findOrFail($id);
        $Client->title = $request->title;
        if ($request->hasFile('file')) {
            $old_path = Storage::path(Config::get('constants.VISA_CLIENT_IMAGE').'/'. $Client->file);
            if(File::exists($old_path)) {
                File::delete($old_path);
            }
            $image = $request->file('file');
            $save_name = $Client->title.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.VISA_CLIENT_IMAGE'), $save_name);
            $Client->file = $save_name;
        }
        if ($Client->save()) {
            Toastr::success('Visa Client updated successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/visa-client');
        } else {
            Toastr::error('Visa Client   dose not updated successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/visa-client');
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
        $Client = VisaClient::findOrFail($id);
        if ($Client->delete()) {
            return response()->json(['success' => 'Client deleted successfully.']);
        } else {
            return response()->json(['success' => 'Client dose not deleted successfully.']);
        }
    }
}