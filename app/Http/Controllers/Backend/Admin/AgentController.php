<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page_title = 'Agent';
        $page_description = '';
        $page_breadcrumbs  = array (['page' => 'admin', 'title' => 'Dashboard']);

        //dd($page_breadcrumbs);
        if($request->ajax())
        {
            $data = User::where('role', '3')->latest()->get();
            return DataTables::of($data)
                    ->addColumn('action', function($data){
                        $button = '<a href="javascript:;"  name="edit" id="'.$data->id.'" class="btn btn-success btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
                        ';
                        $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i>';
                        return $button;
                    })
                    ->editColumn('last_login_at', function($data) {
                        $date = $data->last_login_at;
                       return date('M-d-Y h:i A', strtotime($date));
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('backend.admin.agent.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {   
        $page_title = 'Agent';
        $page_description = '';
        $page_breadcrumbs  = array (['page' => 'admin/agent', 'title' => 'Agent List']);

        return view('backend.admin.agent.form', compact('page_title', 'page_description', 'page_breadcrumbs'));

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
            'first_name'        =>  'required',
            'last_name'         =>  'required',
            'email'             =>  'required|email|unique:users',
            'password'          =>  'required', 
            'confirm_password'  =>  'required|same:password',
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'first_name'       =>  $request->first_name,
            'last_name'        =>  $request->last_name,
            'name'             =>   $request->first_name.' '.$request->last_name,
            'email'            =>  $request->email,
            'role'             =>  3,
            'password'         =>  Hash::make($request->password)
        );

        User::create($form_data);

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
            $data = User::findOrFail($id);
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
            'first_name'        =>  'required',
            'last_name'         =>  'required',
            'email'             =>  'required|email|unique:users,email,'.$request->hidden_id,
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'first_name'   =>  $request->first_name,
            'last_name'    =>  $request->last_name,
            'name'         =>   $request->first_name.' '.$request->last_name,
            'email'        =>  $request->email,
        );

        User::whereId($request->hidden_id)->update($form_data);

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
        $data = User::findOrFail($id);
        $data->delete();
    }
}
