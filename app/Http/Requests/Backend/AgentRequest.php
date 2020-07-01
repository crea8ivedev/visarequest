<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
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
            'first_name'        =>  'required',
            'last_name'         =>  'required',
            'email'             =>  'required|email|unique:users,email',
            'password'          =>  'required', 
            'confirm_password'  =>  'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'       => 'Please enter first name',
            'last_name.required'        => 'Please enter last name',
            'email.required'            => 'Please enter email',
            'password.required'         => 'Please enter password',
            'confirm_password.required' => 'Please enter confirm password',
        ];
    }
}
