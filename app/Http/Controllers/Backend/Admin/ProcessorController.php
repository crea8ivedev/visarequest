<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ProcessorRequest;
use App\Models\User;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Config;

class ProcessorController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Processors';
            $page_description  = '';
            $page_breadcrumbs  = '';

            if($request->ajax())
            {

                $users = User::where('role',Config::get('constants.roles.PROCESSOR'));

                // Search for a services based on their name.
                if ($request->has('search') && ! is_null($request->get('search'))) {
                    $search = $request->get('search');
                    $users->where(function($query) use ($search) {
                       $query->orWhere('first_name', 'LIKE', '%' . $search . '%');
                       $query->orWhere('last_name', 'LIKE', '%' . $search . '%');
                       $query->orWhere('email', 'LIKE', '%' . $search . '%');
                    });
                }

                $data = $users->latest()->get();
                
                return DataTables::of($data)
                        ->addColumn('action', function($data){
                            $button = '<a href="/admin/processor/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
                            ';
                            $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a> ';

                            $button .= '<a href="/admin/processor/view-jobs/'.$data->id.'" target="_blank"  name="element" id="' . $data->id . '" class="btn btn-info btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="View open jobs"><i class="fas fa-eye"></i></a> ';
                            return $button;
                        })
                        ->editColumn('last_login_at', function($data) {
                            $date = $data->last_login_at;
                           if ($date != null) {
                             return date('d-M-Y h:i A', strtotime($date));
                           } else {
                            return '-';
                            
                           }
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }

            return view('backend.admin.processor.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {   
        $page_title         = 'Processor';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'admin/processor', 'title' => 'Processors'], ['page' => 'admin/processor/add', 'title' =>'Add']);

        return view('backend.admin.processor.add', compact('page_title', 'page_description', 'page_breadcrumbs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProcessorRequest $request)
    {   
        $user             = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->status     = $request->status;
        $user->role       = Config::get('constants.roles.PROCESSOR');
        $user->password   = Hash::make($request->password);

       if($user->save()) {
       
        Toastr::success('Processor added successfully!','', Config::get('constants.toster'));
        return redirect('/admin/processor');

       } else {
        
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
        $data               = User::findOrFail($id);
        $page_title         = 'Processor';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'admin/processor', 'title' => 'Processors'], ['page' => 'admin/processor/edit/'.$id.'', 'title' =>'Edit']);

        return view('backend.admin.processor.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function viewJobs($id)
    {
        $data               = User::findOrFail($id);
        $page_title         = 'Processor view jobs';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'admin/processor', 'title' => 'Processor']);

        return view('backend.admin.processor.view_jobs', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ProcessorRequest $request)
    {
       
        $user             = User::findOrFail($request->hidden_id);
        $user->id         = $request->hidden_id;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->status     = $request->status;

        if ($request->password != '') {
            $user->password   = Hash::make($request->password);
        }

       if($user->save()) {
        Toastr::success('Processor updated successfully!','', Config::get('constants.toster'));
        return redirect('/admin/processor');
       } else {
        Toastr::error('Processor dose not update!','', Config::get('constants.toster'));
        return redirect('/admin/processor');
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
      $user = User::findOrFail($id);

       if($user->delete()) {
         return response()->json(['success' => 'Processor deleted successfully!']);
       } else {
         return response()->json(['success' => 'Processor dose not delete!']);
       }
    }

}
