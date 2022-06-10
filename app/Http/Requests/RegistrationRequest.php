<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;

class RegistrationRequest extends FormRequest
{
//    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'bail|required|email|unique:users,email',
            'password1' => 'required|same:password2',
            'password2' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ];
    }

    public function attributes(): array
    {
        return [
            'password1' => 'Password',
            'password2' => 'Password again',
        ];
    }

    public function withValidator(Validator $validator)
    {
        if ($validator->fails()) {
            $errors = $validator->errors()->toArray();
            if (array_key_exists('email', $errors)) {
                if (in_array('The email has already been taken.', $errors["email"])) {
                    $message = "Not unique email";
                    $data = $validator->getData();
                    $context = ['email' => $data['email']];
                    Log::channel('registration')->error($message, $context);
                }
            }
        }
    }
}
