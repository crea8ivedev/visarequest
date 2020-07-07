<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $request = $this->request->all();
        if ($segmentId) {
           return [
                'first_name'        =>  'required',
                'email'             =>  'required|email|unique:users,email,'.$segmentId,
                'phone'             =>  'required|numeric',
                'profile_image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];

        } else {

            //dd($this->request->all()    );
           return [
                'first_name'        =>  'required',
                'email'             =>  'required|email|unique:users,email',
                'phone'             =>  'required|numeric',
                'profile_image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }
    }
}
