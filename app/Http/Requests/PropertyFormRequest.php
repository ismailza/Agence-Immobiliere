<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            'title' => ['required', 'min:4'],
            'description' => ['required', 'min:25'],
            'surface' => ['required', 'integer', 'min:10'],
            'rooms' => ['required', 'integer', 'min:1'],
            'bedrooms' => ['required', 'integer', 'min:0'],
            'floor' => ['required', 'integer', 'min:0'],
            'address' => ['required', 'min:8'],
            'postal_code' => ['numeric','required', 'regex:/^[0-9]{5}$/'],
            'city' => ['required', 'min:4'],
            'price' => ['numeric', 'regex:/^[0-9]+(\.[0-9]{0,3})?$/'],
            'sold' => ['required', 'boolean'],
            'options' => ['array', 'exists:options,id']
        ];
    }
}
