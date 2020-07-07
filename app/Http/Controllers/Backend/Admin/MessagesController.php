<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use DataTables;
use Toastr;
use Config;
use App\Http\Requests\Backend\MessageRequest;

class MessagesController extends Controller
{
     /**
     * Show the application country.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
            $page_title        = 'Messages';
            $page_description  = '';
            $page_breadcrumbs  = array (['page' => 'admin', 'title' => 'Dashboard']);

            if($request->ajax())
            {
                $messages = Message::Query();

                // Search for a services based on their name.
                if ($request->has('search') && ! is_null($request->get('search'))) {
                    $search = $request->get('search');
                    $messages->where(function($query) use ($search) {
                       $query->orWhere('message', 'LIKE', '%' . $search . '%');
                       $query->orWhere('subject', 'LIKE', '%' . $search . '%');
                    });
                }

                $data = $messages->latest()->get();
                
                return DataTables::of($data)
                    ->addColumn('action', function($data) {
                        $button = '<a href="/admin/messages/reply/'.$data->id.'"  name="edit" id="'.$data->id.'" class="btn btn-primary btn-sm rounded-0 edit btn btn-sm btn-clean btn-icon" title="Reply"><i class="la la-reply"></i></a>
                        ';
                        $button .= '<a href="javascript:;" name="delete" id="'.$data->id.'" class="btn btn-danger btn-sm rounded-0 delete btn btn-sm btn-clean btn-icon" title="Delete"><i class="la la-trash"></i></a>';

                        
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

            return view('backend.admin.messages.index', compact('page_title', 'page_description', 'page_breadcrumbs'));
    }

    public function create(Request $request)
    {   
        $page_title         = 'Send New Message';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'admin/messages', 'title' => 'Messages']);
        $user_list          = User::get();

        return view('backend.admin.messages.add', compact('page_title', 'page_description', 'page_breadcrumbs', 'user_list'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {   
        $message             = new Message;
        $message->user_id    = $request->user_id;
        $message->email_type = $request->email_type;
        $message->subject    = $request->subject;
        $message->message    = $request->message;

       if($message->save()) {
        
        Toastr::success('Send message successfully!','', Config::get('constants.toster'));
        return redirect('/admin/messages');

       } else {
        Toastr::success('message dose not send!','', Config::get('constants.toster'));
        return redirect('/admin/messages/add');
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
        $data               = Message::findOrFail($id);
        $page_title         = 'Massage Reply';
        $page_description   = '';
        $page_breadcrumbs   = array (['page' => 'admin/messages', 'title' => 'Messages']);
        $user_list          = User::get();

        return view('backend.admin.messages.edit', compact('data','page_title', 'page_description', 'page_breadcrumbs', 'user_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(MessageRequest $request)
    {
       
        $message             = Message::findOrFail($request->hidden_id);
        $message->id         = $request->hidden_id;
        $message->email_type = $request->email_type;
        $message->subject    = $request->subject;
        $message->message    = $request->message;

       if($message->save()) {
            Toastr::success('Send message successfully!','', Config::get('constants.toster'));
            return redirect('/admin/messages');
       } else {
            Toastr::error('Message dose not send!','', Config::get('constants.toster'));
            return redirect('/admin/messages/reply');
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
         return response()->json(['success' => 'Message deleted successfully!']);
       } else {
         return response()->json(['success' => 'Message dose not delete!']);
       }
    }
}
