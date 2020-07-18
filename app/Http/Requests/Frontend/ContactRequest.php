<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        return [
            'name'              =>  'required',
            'email'             =>  'required|email',
            'phone'             =>  'required|numeric',
            'subject'           =>  'required',
            'message'           =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name.',
            'email.required' => 'Please enter email.',
            'email.email'  => 'Please enter valid email address.',
            'phone.required' => 'Please enter phone number.',
            'phone.numeric' => 'Please enter valid phone number.',
            'subject.required' => 'Please enter subject.',
            'message.required' => 'Please enter message.',
        ];
    }
}
