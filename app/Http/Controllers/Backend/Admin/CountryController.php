<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\CountryRequest;
use App\Models\Country;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use File;
use Toastr;
use Config;

class CountryController extends Controller
{
    public function index(Request $request)
    {
        $page_title        = 'Countries';
        $page_description  = '';
        $page_breadcrumbs  = '';
        if ($request->ajax()) {
            $service = Country::query();
            if ($request->has('search') && !is_null($request->get('search'))) {
                $search = $request->get('search');
                $service->where('country_name', 'LIKE', '%' . $request->search . '%');
            }
            $data = $service->latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $button = '<a href="/admin/country/edit/' . $data->id . '"  name="edit" id="' . $data->id . '" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a> ';
                    $button .= '<a href="javascript:;" name="delete" id="' . $data->id . '" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i><a/>';
                    return $button;
                })
                ->editColumn('need_visa', function ($data) {
                    return ($data->need_visa) ? 'Yes' : 'No';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.admin.country.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {
        $page_title         = 'Country';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/country', 'title' => 'Countries'],['page' => 'admin/country/add', 'title' =>'Add']);
        return view('backend.admin.country.add', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryRequest $request)
    {      

        $country  = new Country;
        $country->name = $request->name;
        $country->description = $request->description;
        $country->need_visa  = $request->need_visa;
        if ($request->hasFile('countryFlag')) {
            $image = $request->file('countryFlag');
            $save_name = $country->name.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.COUNTRY_IMAGE'), $save_name);
            $country->flag = $save_name;
        }
        if ($request->hasFile('countryTouristImage')) {
            $image = $request->file('countryTouristImage');
            $save_name =  $country->name.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.COUNTRY_TOURIST_IMAGE'), $save_name);
            $country->tourist_image = $save_name;
        }
       if ($country->save()) {
            Toastr::success('Country added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/country');
        } else {
            Toastr::error('Country  dose not added successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/country');
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
        $data               = Country::findOrFail($id);
        $page_title         = 'Country';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/country', 'title' => 'Countries'],['page' => 'admin/country/edit/'.$id.'', 'title' =>'Edit']);
        $country_list          = Country::latest()->get();
        return view('backend.admin.country.edit', compact('data', 'page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(CountryRequest $request, $id)
    {
        $country  = Country::findOrFail($id);
        $country->name = $request->name;
        $country->description = $request->description;
        $country->need_visa  = $request->need_visa;
        if ($request->hasFile('countryFlag')) {
            $old_path = Storage::path(Config::get('constants.APPLICATION_FILE_STORE').'/'. $country->flag);
            if(File::exists($old_path)) {
                File::delete($old_path);
            }
            $image = $request->file('countryFlag');
            $save_name = $country->name.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.COUNTRY_IMAGE'), $save_name);
            $country->flag = $save_name;
        }
        if ($request->hasFile('countryTouristImage')) {
            $old_path = Storage::path(Config::get('constants.APPLICATION_FILE_STORE').'/'. $country->tourist_image);
            if(File::exists($old_path)) {
                File::delete($old_path);
            }
            $image = $request->file('countryTouristImage');
            $save_name =  $country->name.'.'.$image->getClientOriginalExtension();
            $image->storeAs(Config::get('constants.IMAGES.COUNTRY_TOURIST_IMAGE'), $save_name);
            $country->tourist_image = $save_name;
        }
        if ($country->save()) {
            Toastr::success('Country updated successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/country');
        } else {
            Toastr::error('Country  dose not updated successfully!', '', Config::get('constants.toster'));
            return redirect('/admin/country');
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
        $country = Country::findOrFail($id);
        if ($country->delete()) {
            return response()->json(['success' => 'Country deleted successfully.']);
        } else {
            return response()->json(['success' => 'Country dose not deleted successfully.']);
        }
    }
}