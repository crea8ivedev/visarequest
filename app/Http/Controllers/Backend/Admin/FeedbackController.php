<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Backend\FeebackRequest;
use App\Models\Feedback;
use App\Models\EmailTemplate;
use DataTables;
use Toastr;
use Config;
use Mail;
use Illuminate\Support\Facades\Log;

class FeedbackController extends Controller
{
    /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
     {   
             $page_title        = 'Feedback';
             $page_description  = '';
             $page_breadcrumbs  = '';
 
             if($request->ajax())
             {
                 $feedback = Feedback::Query();
 
                 // Search for a services based on their name.
                 if ($request->has('search') && ! is_null($request->get('search'))) {
                     $search = $request->get('search');
                     $feedback->where(function($query) use ($search) {
                        $query->orWhere('name', 'LIKE', '%' . $search . '%');
                        $query->orWhere('email', 'LIKE', '%' . $search . '%');
                     });
                 }
 
                 $data = $feedback->latest()->get();
                 
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
                     ->editColumn('status', function($data) {
                         if($data->status == 'Replied') {
                          return '<span class="label label-lg label-light-success label-inline">Replied</span>';
                         } else if($data->status == 'New' ) {
                              return '<span class="label label-lg label-light-danger label-inline">New</span>';
                         }
                     })
                     ->rawColumns(['action', 'status'])
                     ->make(true);
             }
 
             return view('backend.admin.feedback.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  \App\feedback  $feedback
      * @return \Illuminate\Http\Response
      */
     public function reply($id)
     {
         if(request()->ajax())
         {
             $data = Feedback::findOrFail($id);
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
     public function update(feedbackRequest $request)
     {
        
         $feedback             = Feedback::findOrFail($request->hidden_id);
         $feedback->id         = $request->hidden_id;
         $feedback->status     = 'Replied';
     
 
        if($feedback->save()) {
 
         $feedbackDetail = Feedback::whereId($request->hidden_id)->first();
 
         if ($feedbackDetail->email != '' ) {
             $from       = env('MAIL_FROM_ADDRESS');
             $send       = $feedbackDetail->email;
             $content    = $request->comment;
           
             $template  = EmailTemplate ::where('email_type', 'Client feedback Us Email Template')->first();
             $templateContent = $template->message;
            
             try {
                 Mail::send([], [], function($message) use ($template,$templateContent,$feedbackDetail,$content)
                 {
                     $data = [
                         'name' => $feedbackDetail->name,
                         'email' => $feedbackDetail->email,
                         'subject' => $template->subject,
                         'message' => $content,
                     ];
 
                     $content = $template->message;
                     $content = $template->parse($data);
 
                     $message->from($template->sender_email, 'VisaRequest');
                     $message->to($feedbackDetail->email, $feedbackDetail->name)
                     ->subject($template->subject, 'Admin')
                     ->setBody($content, 'text/html');
                 });
 
             } catch (Exception $ex) {
                 // Debug via $ex->getMessage();
                 return "We've got errors!";
             }
         }
         
             Toastr::success('Feedback replied successfully!','', Config::get('constants.toster'));
             return redirect('/admin/feedback');
        } else {
             Toastr::error('Feedback replied dose not updated!','', Config::get('constants.toster'));
             return redirect('/admin/feedback');
        }
     
     }
 
     /**
      * Remove the specified resource from storage.
      *
      * @param  \App\feedback  $feedback
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         $feedback = Feedback::findOrFail($id);
         if ($feedback->delete()) {
             return response()->json(['success' => 'Feedback deleted successfully.']);
         } else {
             return response()->json(['success' => 'Feedback dose not deleted successfully.']);
         }
     }
}
