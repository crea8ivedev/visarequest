<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ServiceCategoryRequest extends FormRequest
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
                'name'             =>  'required|unique:service_categories,name,' . $segmentId,
            ];
        } else {

            return [
                'name'             =>  'required|unique:service_categories,name',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required'       => 'Please enter category name',
            'name.unique'       => 'The service name has already been taken',
        ];
    }
}
