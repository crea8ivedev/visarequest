<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VisaQuestionRequest extends FormRequest
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
            'lable'          =>  'required',
            'value'          =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'lable.required' => 'Please enter lable.',
            'value.required'  => 'Please enter value.',
        ];
    }
}
