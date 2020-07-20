<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
                'country_id'   =>  'required',
                'heading'        =>  'required',
                'message'           =>  'required',
            ];

        } else {

           return [
                'country_id'   =>  'required',
                'heading'        =>  'required',
                'message'           =>  'required',
            ];
        }
    }
}
