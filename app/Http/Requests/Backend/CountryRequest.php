<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
                    'name'        =>  'required|unique:countries,name,'.$segmentId,
                    'countryFlag' => "mimes:png,jpeg,jpg,gif",
                    'countryTouristImage' => "mimes:png,jpeg,jpg"

                ];

        } else {
            return [
                'name'        =>  'required|unique:countries,name',
                'countryFlag' => "required|mimes:png,jpeg,jpg,gif",
                'countryTouristImage' => "mimes:png,jpeg,jpg,gif"

            ];
        }
    }

    public function messages()
    {
        return [
            'name.required'       => 'Please enter country name',
            'name.unique'       => 'Country name already exists.',
            'countryTouristImage.mimes'       => 'Please select valid image.',
            'countryFlag.mimes'       => 'Please select valid image.',
        ];
    }
}