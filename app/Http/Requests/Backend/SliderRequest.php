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
                'name'=>"required|unique:sliders,name,".$id,
                'image'   =>  'mimes:jpeg,png,jpg,gif',
            ];
        } else {
            return [
                'name'=>"required|unique:sliders,name",
                'image'   =>  'required|mimes:jpeg,png,jpg,gif',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' =>"Please enter name",
            'image.required'          => 'Please select valid image',
            'image.mimes'          => 'Please select valid image',
        ];
    }
}