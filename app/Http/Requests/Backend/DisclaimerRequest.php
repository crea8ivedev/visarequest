<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class DisclaimerRequest extends FormRequest
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
            'name'            =>  'required',
            'heading'            =>  'required',
            'description'            =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Please enter name',
            'heading.required'          => 'Please enter heading',
            'description.required'      => 'Please enter description',
        ];
    }
}