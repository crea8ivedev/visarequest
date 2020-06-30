<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Country;
use Yajra\DataTables\DataTables;
use Validator; 

class CountryController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title = 'Country';
        $page_description = '';
        $page_breadcrumbs  = array (['page' => 'admin', 'title' => 'Dashboard']);

        //dd($page_breadcrumbs);
        if($request->ajax())
        {	
        	$country = Country::query();
        	 // Search for a country based on their need_visa.
		    if ($request->has('need_visa') && ! is_null($request->get('need_visa'))) {
		        $country->where('need_visa',$request->need_visa);
		    }
			// Search for a country based on their name.
		    if ($request->has('search') && ! is_null($request->get('search'))) {
		        $country->where('name', 'LIKE', '%' . $request->search . '%');
		    }

		    $data =  $country->latest()->get();
		    
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

        return view('backend.admin.country.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
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
            'name'        	    =>  'required|unique:countries',
            'description'       =>  'required',
            'need_visa'         =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'       	   =>  $request->name,
            'description'      =>  $request->description,
            'need_visa'        =>  $request->need_visa,
        );

        Country::create($form_data);

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
            $data = Country::findOrFail($id);
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
            'name'              =>  'required|unique:countries,name,'.$request->hidden_id,
            'description'       =>  'required',
            'need_visa'         =>  'required',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'name'       	   =>  $request->name,
            'description'      =>  $request->description,
            'need_visa'        =>  $request->need_visa,
        );

        Country::whereId($request->hidden_id)->update($form_data);

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
        $data = Country::findOrFail($id);
        $data->delete();
    }
}
