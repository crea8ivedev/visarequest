<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\ContactRequest;
use App\Models\Contact;
use App\Models\EmailTemplate;
use DataTables;
use Toastr;
use Config;
use Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\Example;

class ContactController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Contact US';
            $page_description  = '';
            $page_breadcrumbs  = '';

            if($request->ajax())
            {
                $contact = Contact::Query();

                // Search for a services based on their name.
                if ($request->has('search') && ! is_null($request->get('search'))) {
                    $search = $request->get('search');
                    $contact->where(function($query) use ($search) {
                       $query->orWhere('name', 'LIKE', '%' . $search . '%');
                       $query->orWhere('email', 'LIKE', '%' . $search . '%');
                       $query->orWhere('phone', 'LIKE', '%' . $search . '%');
                    });
                }

                $data = $contact->latest()->get();
                
                return DataTables::of($data)
                    ->addColumn('action', function($data) {
                        if($data->status == 'New') {
                            $button = '<a href="javascript:void(0);"  name="reply" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 reply btn btn-sm btn-clean btn-icon" title="Reply"><i class="fas fa-reply"></i></a>
                            '; 
                            $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                        } else {
                            $button = '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';
                        }
                        
                        return $button;
                    })
                    ->editColumn('date', function($data) {
                        $date = $data->created_at;    
                       return '<span class="text-info font-weight-bolder d-block">
                                '. date('d-M-Y h:i A', strtotime($date)) .' </span>';
                    })
                    ->editColumn('status', function($data) {
                        if($data->status == 'Replied') {
                         return '<span class="label label-lg label-light-success label-inline">Replied</span>';
                        } else if($data->status == 'New' ) {
                             return '<span class="label label-lg label-light-danger label-inline">New</span>';
                        }
                    })
                    ->rawColumns(['action', 'date', 'status'])
                    ->make(true);
            }

            return view('backend.admin.contact.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function reply($id)
    {
        if(request()->ajax())
        {
            $data = Contact::findOrFail($id);
            $data->date = date('M-d-Y h:i A', strtotime($data->date));
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
    public function update(ContactRequest $request)
    {
       
        $contact             = Contact::findOrFail($request->hidden_id);
        $contact->id         = $request->hidden_id;
        $contact->comment    = $request->comment;
        $contact->status     = 'Replied';
    

       if($contact->save()) {

        $contactDetail = Contact::whereId($request->hidden_id)->first();

        if ($contactDetail->email != '' ) {
            $from       = env('MAIL_FROM_ADDRESS');
            $send       = $contactDetail->email;
            $content    = $request->comment;
          
            $template  = EmailTemplate ::where('email_type', 'Client Contact Us Email Template')->first();
            $templateContent = $template->message;
           
            try {
                Mail::send([], [], function($message) use ($template,$templateContent,$contactDetail,$content)
                {
                    $data = [
                        'name' => $contactDetail->name,
                        'email' => $contactDetail->email,
                        'subject' => $template->subject,
                        'message' => $content,
                    ];

                    $content = $template->message;
                    $content = $template->parse($data);

                    $message->from($template->sender_email, 'VisaRequest');
                    $message->to($contactDetail->email, $contactDetail->name)
                    ->subject($template->subject, 'Admin')
                    ->setBody($content, 'text/html');
                });

            } catch (Exception $ex) {
                // Debug via $ex->getMessage();
                return "We've got errors!";
            }
        }
        
            Toastr::success('Contact replied successfully!','', Config::get('constants.toster'));
            return redirect('/admin/contact');
       } else {
            Toastr::error('Contact replied dose not updated!','', Config::get('constants.toster'));
            return redirect('/admin/contact');
       }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        if ($contact->delete()) {
            return response()->json(['success' => 'Contact deleted successfully.']);
        } else {
            return response()->json(['success' => 'Contact dose not deleted successfully.']);
        }
    }
}
