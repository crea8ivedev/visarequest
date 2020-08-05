<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
                'last_name'        =>  'required',
                'email'             =>  'required|email|unique:users,email',
                'password'          =>  'required|min:6',
            ];
    }

    public function messages()
    {
        return [
            'first_name.required'       => 'Please enter first name.',
            'last_name.required'        => 'Please enter last name.',
            'email.required'            => 'Please enter email.',
            'phone.required'            => 'Please enter phone number.',
            'phone.numeric'             => 'Please enter valid phone number.',
            'password.required'         => 'Please enter password.',
        ];
    }
}