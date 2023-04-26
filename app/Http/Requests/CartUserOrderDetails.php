<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartUserOrderDetails extends FormRequest
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
            "firstName" => ['required', 'min:2', 'max:40', 'string'],
            "lastName" => ['required', 'min:2', 'max:40', 'string'],
            "email" => ['required', 'min:2', 'max:40', 'email'],
            "phone" => ['required', 'min:2', 'max:60'],
            "address" => ['required', 'min:2', 'max:150'],
        ];
    }
}
