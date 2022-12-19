<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:30'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'min:8'],
            'age' => ['required', 'numeric'],
            'telephone'=> ['required','numeric','min:10'],
            'city_uuid' => ['required', 'exists:cities,uuid'],
            'sex' => ['required'],

            'hobbies' => ['array'],
            'hobbies.*.descript' => ['required']
        ];
    }

    public function messages()
    {


        return [
            'name.min' => 'The name field must have at least :min caracters.',
            'name.max' => 'The name field must have a maximum of :max caracters.',

            'email.email' => 'The e-mail field is invalid.',

            'password.min' => 'The password field must have at leat :min caracters.',

            'city_uuid.required' => 'The city field is required.',
            'city_uuid.exists' => 'The chosen city doesn\'t exist.',

            'hobbies.*.descript' => 'One hobby must have a description.',
        ];
    }
}
