<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SocialLinkRequest extends FormRequest
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
            'facebook'            =>  'nullable|url',
            'twitter'             =>  'nullable|url',
            'google'              =>  'nullable|url',
            'linkedin'            =>  'nullable|url',
            'instagram'           =>  'nullable|url',
        ];
    }

    public function messages()
    {
        return [
            'facebook.url'             => 'Please enter valid facebook url',
            'twitter.url'             => 'Please enter valid twitter url',
            'google.url'             => 'Please enter valid google url',
            'linkedin.url'             => 'Please enter valid linkedin url',
            'instagram.url'             => 'Please enter valid instagram url',
            
        ];
    }
}
