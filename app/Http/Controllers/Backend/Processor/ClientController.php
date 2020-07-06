<?php

namespace App\Http\Controllers\Backend\Processor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ClientRequest;
use App\Models\User;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Config;

class ClientController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Clients';
            $page_description  = '';
            $page_breadcrumbs  = array (['page' => 'processor', 'title' => 'Dashboard']);

            if($request->ajax())
            {
                $users = User::where('role',Config::get('constants.roles.USER'));

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
                    ->addColumn('action', function($data) {
                        $button = '<a href="/processor/client/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
                        ';
                        
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

            return view('backend.processor.client.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {   
        $page_title         = 'Client';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'processor/client', 'title' => 'Client']);

        return view('backend.processor.client.add', compact('page_title', 'page_description', 'page_breadcrumbs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {   
        $user             = new User;
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->phone      = $request->phone;
        $user->status     = $request->status;
        $user->role       = Config::get('constants.roles.USER');
        $user->password   = Hash::make($request->password);

       if($user->save()) {
        
        Toastr::success('Client added successfully!','', Config::get('constants.toster'));
        return redirect('/processor/client');

       } else {
        Toastr::success('Client dose not add!','', Config::get('constants.toster'));
        return redirect('/processor/client/add');
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
        $page_title         = 'Client';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'processor/client', 'title' => 'Client']);

        return view('backend.processor.client.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request)
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
            Toastr::success('Client updated successfully!','', Config::get('constants.toster'));
            return redirect('/processor/client');
       } else {
            Toastr::error('Client  dose not update!','', Config::get('constants.toster'));
            return redirect('/processor/client/edit');
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
         return response()->json(['success' => 'Client deleted successfully!']);
       } else {
         return response()->json(['success' => 'Client dose not delete!']);
       }
    }
}
