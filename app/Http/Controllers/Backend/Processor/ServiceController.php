<?php

namespace App\Http\Controllers\Backend\Processor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use DataTables;
use Toastr;
use Config;
use Auth;

class ServiceController extends Controller
{
     /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Completed Services';
            $page_description  = '';
            $page_breadcrumbs  = array (['page' => 'processor', 'title' => 'Dashboard']);

            if($request->ajax())
            {   
                $authId = Auth::user()->id;
                $service = Service::where('processor_id', $authId);

                // Search for a services based on their name.
                if ($request->has('search') && ! is_null($request->get('search'))) {
                    $search = $request->get('search');
                    $service->where(function($query) use ($search) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%');
                    });
                }

                $data = $service->latest()->get();
                
                return DataTables::of($data)
                    ->addColumn('action', function($data) {
                        $button = '<a  href="#" hrefs="/processor/service/view/'.$data->id.'"  name="view" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="View details"><i class="la la-eye"></i></a>
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

            return view('backend.processor.completed_service.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }
}
