<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class VisaClientRequest extends FormRequest
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
                    'title'        =>  'required|unique:visa_clients,title,'.$segmentId,
                    'file' => "mimes:png,jpeg,jpg,gif"
                ];

        } else {
            return [
                'title'        =>  'required|unique:visa_clients,title',
                'file' => "required|mimes:png,jpeg,jpg,gif"
            ];
        }
    }

    public function messages()
    {
        return [
            'title.required'       => 'Please enter title',
            'title.unique'       => 'Visa Client already exists.',
            'file.mimes'       => 'Please select valid image.',
        ];
    }
}