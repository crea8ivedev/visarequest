<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Country;
use App\Models\User;
use Yajra\DataTables\DataTables;
use Validator; 

class ServiceController extends Controller
{
    /**
     * Show the application services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title 		= 'Service';
        $page_description 	= '';
        $page_breadcrumbs  	= array (['page' => 'admin', 'title' => 'Dashboard']);
        $country_list  		= Country::latest()->get();
        $staff_list  		= User::where('role','2')->latest()->get();
        $agent_list  		= User::where('role','3')->latest()->get();

        //dd($page_breadcrumbs);
        if($request->ajax())
        {	
        	$services = Service::query();
        	 // Search for a services based on their need_visa.
		    if ($request->has('country_id') && ! is_null($request->get('country_id'))) {
		        $services->where('country_id',$request->country_id);
		    }
			// Search for a services based on their name.
		    if ($request->has('search') && ! is_null($request->get('search'))) {
		        $services->where('name', 'LIKE', '%' . $request->search . '%');
		    }

		    $data =  $services->with('country', 'staff', 'agent')->latest()->get();
		    
            return DataTables::of($data)
            		->addIndexColumn()
                    ->addColumn('action', function($data) {
                        $button = '<a href="javascript:;"  name="edit" id="'.$data->id.'" class="btn btn-success btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
                        ';
                        $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i>';
                        return $button;
                    })
                    ->addColumn('need_visa', function($data){
                    	if ($data->need_visa == '1')
                        	$button = '<span class="label label-lg label-light-success label-inline">Yes</span>';
                        else
                        	$button = '<span class="label label-lg label-light-danger label-inline">No</span>';
                        
                        return $button;
                    })
                    ->rawColumns(['action', 'need_visa'])
                    ->make(true);
                    
        }

        return view('backend.admin.services.index', compact('page_title', 'page_description', 'page_breadcrumbs' ,'country_list' ,'staff_list', 'agent_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'country_id'        =>  'required',
            'staff_id'       	=>  'required',
            'agent_id'       	=>  'required',
            'name'        	    =>  'required|unique:services',
            'description'       =>  'required',
            'normal_price'      =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'country_id'       =>  $request->country_id,
            'staff_id'         =>  $request->staff_id,
            'agent_id'         =>  $request->agent_id,
            'agent_id'         =>  $request->agent_id,
            'name'       	   =>  $request->name,
            'description'      =>  $request->description,
            'normal_price'     =>  $request->normal_price,
            'discount_price'   =>  $request->discount_price,
            'commission'   	   =>  $request->commission,
        );

        Service::create($form_data);

        return response()->json(['success' => 'Data Added successfully.']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(request()->ajax())
        {
            $data = Service::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'country_id'        =>  'required',
            'staff_id'       	=>  'required',
            'agent_id'       	=>  'required',
            'name'              =>  'required|unique:services,name,'.$request->hidden_id,
            'description'       =>  'required',
            'normal_price'      =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'country_id'       =>  $request->country_id,
            'staff_id'         =>  $request->staff_id,
            'agent_id'         =>  $request->agent_id,
            'agent_id'         =>  $request->agent_id,
            'name'       	   =>  $request->name,
            'description'      =>  $request->description,
            'normal_price'     =>  $request->normal_price,
            'discount_price'   =>  $request->discount_price,
            'commission'   	   =>  $request->commission,
        );

        Service::whereId($request->hidden_id)->update($form_data);

        return response()->json(['success' => 'Data is successfully updated']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Service::findOrFail($id);
        $data->delete();
    }

}
