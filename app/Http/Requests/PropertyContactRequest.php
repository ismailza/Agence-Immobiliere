<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'string', 'min:3'],
            'lastname' => ['required', 'string', 'min:3'],
            'phone' => ['required', 'numeric', 'regex:/^\+?[0-9]{10,14}$/'],
            'email' => ['required', 'email'],
            'message' => ['required', 'string', 'min:8']
        ];
    }
}
