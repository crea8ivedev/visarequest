<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
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
                'subject'           =>  'required',
                'message'           =>  'required',
                'email_type'        =>  'required',
            ];

        } else {

           return [
                'user_id'           =>  'required',
                'subject'           =>  'required',
                'message'           =>  'required',
                'email_type'        =>  'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'user_id.required'          => 'Please select user',
            'subject.required'          => 'Please enter subject',
            'message.required'          => 'Please enter message',
            'email_type.required'       => 'Please enter email type',
        ];
    }
}
