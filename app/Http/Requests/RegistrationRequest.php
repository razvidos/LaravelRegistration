<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'email' => 'bail|required|email|unique:users,email',
            'password1' => 'required|same:password2',
            'password2' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'password1' => 'Password',
            'password2' => 'Password again',
        ];
    }
}
