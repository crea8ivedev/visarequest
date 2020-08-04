<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Frontend\ContactRequest;
use App\Http\Requests\Frontend\FeedbackRequest;
use App\Models\Contact;
use App\Models\Feedback;

class ContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {   
        $contact             = new Contact;
        $contact->name       = $request->name;
        $contact->email      = $request->email;
        $contact->phone      = $request->phone;
        $contact->subject    = $request->subject;
        $contact->message    = $request->message;

       if($contact->save()) {
            return response()->json(['success' => 'Thank You! Your contact information has been sent successfully. We will contact you very soon!']);
       } else {
        return response()->json(['success' => 'Your contact information has been  not sent successfully. Plese try again!']);
       }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function feedbackStore(FeedbackRequest $request)
     {   
         $feedback             = new Feedback;
         $feedback->name       = $request->name;
         $feedback->email      = $request->email;
         $feedback->message    = $request->message;
 
        if($feedback->save()) {
             return response()->json(['success' => 'Thank You! Your feedback information has been sent successfully. We will contact you very soon!']);
        } else {
         return response()->json(['success' => 'Your feedback information has been  not sent successfully. Plese try again!']);
        }
     }

}
