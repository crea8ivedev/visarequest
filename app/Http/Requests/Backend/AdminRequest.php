<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                'first_name'        =>  'required',
                'email'             =>  'required|email|unique:users,email,'.$segmentId,
                'phone'             =>  'required|numeric',
                'password'          =>  'nullable|min:6',
                'confirm_password'  =>  'required_with:password|same:password',
            ];

        } else {

           return [
                'first_name'        =>  'required',
                'email'             =>  'required|email|unique:users,email',
                'phone'             =>  'required|numeric',
                'password'          =>  'required|min:6', 
                'confirm_password'  =>  'required|same:password',
            ];
        }

    }

    public function messages()
    {
        return [
            'first_name.required'       => 'Please enter first name',
            'last_name.required'        => 'Please enter last name',
            'email.required'            => 'Please enter email',
            'phone.required'            => 'Please enter phone number',
            'phone.numeric'             => 'Please enter valid phone number',
            'password.required'         => 'Please enter password',
            'confirm_password.required' => 'Please enter confirm password',
        ];
    }
}
