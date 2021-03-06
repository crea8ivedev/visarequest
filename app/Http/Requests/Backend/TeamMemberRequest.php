<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TeamMemberRequest extends FormRequest
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
                'name'              =>  'required|unique:team_members,name,'.$segmentId,
                'position'          =>  'required',
                'email'             =>  'nullable|email',
                'phone'             =>  'nullable|numeric',
                'facebook'          =>  'nullable|url',
                'instagram'         =>  'nullable|url',
                'twitter'           =>  'nullable|url',
                
            ];

        } else {

           return [
                'name'              =>  'required|unique:team_members,name,',
                'position'          =>  'required',
                'email'             =>  'nullable|email',
                'phone'             =>  'nullable|numeric',
                'facebook'          =>  'nullable|url',
                'instagram'         =>  'nullable|url',
                'twitter'           =>  'nullable|url',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required'             => 'Please enter name',
            'email.email'               => 'Please enter valid email',
            'position.required'         => 'Please enter position',
            'phone.numeric'             => 'Please enter valid phone number',
            'facebook.url'              => 'Please enter valid facebook url',
            'instagram.url'             => 'Please enter valid instagram url',
            'twitter.url'               => 'Please enter valid twitter url',
        ];
    }
}