<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
                'country_id'        =>  'required',
                'processor_id'         =>  'required',
                'agent_id'             =>  'required',
                'name'          =>  'required|unique:services,name,' . $id,
                'description'  =>  'required',
                'normal_price'  =>  'required|regex:/^\d+(\.\d{1,2})?$/',
                'discount_price'  =>  'required|regex:/^\d+(\.\d{1,2})?$/',
                'commission'  =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            ];
        } else {
            return [
                'country_id'        =>  'required',
                'processor_id'         =>  'required',
                'agent_id'             =>  'required',
                'name'          =>  'required|unique:services,name',
                'description'  =>  'required',
                'normal_price'  =>  'required|regex:/^\d+(\.\d{1,2})?$/',
                'discount_price'  =>  'required|regex:/^\d+(\.\d{1,2})?$/',
                'commission'  =>  'required|regex:/^\d+(\.\d{1,2})?$/',
            ];
        }
    }

    public function messages()
    {
        return [
            'country_id.required'       => 'Please select country.',
            'processor_id.required'        => 'Please select processor.',
            'agent_id.required'            => 'Please select agent.',
            'name.required'         => 'Please enter service name.',
            'description.required' => 'Please enter description.',
            'normal_price.required' => 'Please enter normal price.',
            'discount_price.required' => 'Please enter discount price.',
            'commission.required' => 'Please enter commission.',
            'normal_price.regex' => 'Please enter valid normal price.',
            'discount_price.regex' => 'Please enter valid discount price.',
            'commission.regex' => 'Please enter valid commission.',
        ];
    }
}
