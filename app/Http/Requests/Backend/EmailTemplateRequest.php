<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class EmailTemplateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $segmentId = request()->segment(4); //returns 'posts'

        if ($segmentId) {
            $request = $this->request->all();
           return [
               'email_type'      =>  'required',
               'sender_email'    =>  'required|email',
               'subject'         =>  'required',
              'message'          =>  'required',
            ];

        } else {

           return [
               'email_type'      =>  'required',
               'sender_email'    =>  'required|email',
                'subject'        =>  'required',
                'message'        =>  'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'email_type.required'        => 'Please enter email type',
            'sender_email.required'      => 'Please enter sender email',
            'sender_email.email'         => 'Please enter valid email',
            'subject.required'           => 'Please enter subject',
            'message.required'           => 'Please enter message',
        ];
    }
}
