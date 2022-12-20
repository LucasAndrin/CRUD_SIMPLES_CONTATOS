<?php

namespace App\Http\Requests;

use App\Rules\CityHasNoUsers;
use Illuminate\Foundation\Http\FormRequest;

class DestroyCityRequest extends FormRequest
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
            'uuid' => ['required', 'exists:cities,uuid', new CityHasNoUsers]
        ];
    }
}
