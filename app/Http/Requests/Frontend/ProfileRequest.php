<?php
namespace App\Http\Requests\Frontend;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $id = request()->id; //returns 'posts'
        return [
            'first_name'        =>  'required',
            'last_name'        =>  'required',
            'email'             =>  'required|email|unique:users,email,' . $id,
            'password'          =>  'nullable|min:6',
            'phone' => 'nullable|numeric'
        ];
    }
    public function messages()
    {
        return [
            'first_name.required'       => 'Please enter first name.',
            'last_name.required'        => 'Please enter last name.',
            'email.required'            => 'Please enter email.',
            'phone.numeric'             => 'Please enter valid phone number.',
            'password.min'             => 'Password must be 6 character.',
        ];
    }
}
