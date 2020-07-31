<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $id = request()->segment(4);
        if ($id) {
            return [
                'image'   =>  'sometimes|nullable|image|mimes:jpeg,png,jpg|max:2048',
            ];
        } else {
            return [
                'image'   =>  'required|image|mimes:jpeg,png,jpg|max:2048',
            ];
        }
    }

    public function messages()
    {
        return [
            'image.required'          => 'Please select valid image',
        ];
    }
}
