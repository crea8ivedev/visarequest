<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use DataTables;
use Toastr;
use Config;
use App\Http\Requests\Backend\EmailTemplateRequest;

class EmailTemplateController extends Controller
{
     /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Email Templates';
            $page_description  = '';
            $page_breadcrumbs  = '';

            if($request->ajax())
            {
                $emailTemplate = EmailTemplate::Query();

                // Search for a services based on their name.
                if ($request->has('search') && ! is_null($request->get('search'))) {
                    $search = $request->get('search');
                    $emailTemplate->where(function($query) use ($search) {
                       $query->orWhere('email_type', 'LIKE', '%' . $search . '%');
                       $query->orWhere('sender_email', 'LIKE', '%' . $search . '%');
                       $query->orWhere('subject', 'LIKE', '%' . $search . '%');
                    });
                }

                $data = $emailTemplate->latest()->get();
                
                return DataTables::of($data)
                    ->addColumn('action', function($data) {
                        $button = '<a href="/admin/email-template/edit/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Edit"><i class="la la-edit"></i></a>
                        ';
                        //$button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';

                        
                        return $button;
                    })
                    ->editColumn('message', function($data) {
                        $message = strip_tags(html_entity_decode($data->message));
                        
                        $data->message;
                        return (strlen($message) > 20) ? substr($message,0,20).'...' : $message;
                    })
                    ->editColumn('date', function($data) {
                       $date = $data->created_at;
                       if ($date != null) {
                         return date('d-M-Y h:i A', strtotime($date));
                       } else {
                        return '-';
                        
                       }
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }

            return view('backend.admin.email_template.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {   
        $page_title         = 'Email Template';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/email-template', 'title' => 'Email Template'],['page' => 'admin/email-template/add', 'title' =>'Add']);
    
        return view('backend.admin.email_template.add', compact('page_title', 'page_description', 'page_breadcrumbs'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailTemplateRequest $request)
    {   
        $emailTemplate               = new EmailTemplate;
        $emailTemplate->email_type   = $request->email_type;
        $emailTemplate->sender_email = $request->sender_email;
        $emailTemplate->subject      = $request->subject;
        $emailTemplate->message      = $request->message;

       if($emailTemplate->save()) {
        
        Toastr::success('Email template added successfully!','', Config::get('constants.toster'));
        return redirect('/admin/email-template');

       } else {
        Toastr::success('Email template dose not added!','', Config::get('constants.toster'));
        return redirect('/admin/email-template/add');
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
        $data               = EmailTemplate::findOrFail($id);
        $page_title         = 'Email Template';
        $page_description   = '';
        $page_breadcrumbs   = array(['page' => 'admin/email-template', 'title' => 'Email Template'],['page' => 'admin/email-template/edit/'.$id.'', 'title' =>'Edit']);
    
        return view('backend.admin.email_template.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(EmailTemplateRequest $request)
    {
       
        $emailTemplate             = EmailTemplate::findOrFail($request->hidden_id);
        $emailTemplate->id         = $request->hidden_id;
        $emailTemplate->email_type = $request->email_type;
        $emailTemplate->sender_email = $request->sender_email;
        $emailTemplate->subject    = $request->subject;
        $emailTemplate->message    = $request->message;

       if($emailTemplate->save()) {
            Toastr::success('Email Template updated successfully!','', Config::get('constants.toster'));
            return redirect('/admin/email-template');
       } else {
            Toastr::error('Email Template dose not updated!','', Config::get('constants.toster'));
            return redirect('/admin/email-template/edit');
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
      $message = Message::findOrFail($id);

       if($message->delete()) {
         return response()->json(['success' => 'Email template deleted successfully!']);
       } else {
         return response()->json(['success' => 'Email template dose not delete!']);
       }
    }
}
