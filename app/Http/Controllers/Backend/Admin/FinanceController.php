<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ClientRequest;
use App\Models\User;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Toastr;
use Config;

class FinanceController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Finance';
            $page_description  = '';
            $page_breadcrumbs  = '';

            if($request->ajax())
            {
                $users = User::where('role',Config::get('constants.roles.CLIENT'));

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
                        $button = '<a href="/admin/client/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit details"><i class="la la-edit"></i></a>
                        ';
                        $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';

                        $button .= '<input data-switch="true" id="'.$data->id.'" type="checkbox" checked="checked"  />';
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

            return view('backend.admin.finance.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
