<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BicycleFormRequest extends FormRequest
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
            "image" => ["required", "image", "mimes:jpg,png,jpeg,gif,svg", "max:10240"],
            "type" => ["required"],
            "brand" => ["required", "string", "min: 4", "max: 40"],
            "model" => ["required", "min: 4", "max: 250"],
            "frame_size" => ["required", "max: 10"],
            "gender_type" => ["required"],
            "year" => ["required", "integer"],
            "quantity" => ["required", "integer"],
            "on_sale" => ["required", "integer"],
            "price" => ["required", "integer"]
        ];
    }
}
