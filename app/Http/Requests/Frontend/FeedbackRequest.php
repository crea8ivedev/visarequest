<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
            'type'              =>  'required',
            'name'              =>  'required',
            'email'             =>  'required|email',
            'message'           =>  'required',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => 'Please select type.',
            'name.required' => 'Please enter name.',
            'email.required' => 'Please enter email.',
            'email.email'  => 'Please enter valid email address.',
            'message.required' => 'Please enter message.',
        ];
    }
}
