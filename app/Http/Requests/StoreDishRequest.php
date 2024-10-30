<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dish_name' => 'required|unique:dishes|max:255',
            'category_id' => 'required',         
        ];
    }

    public function messages(): array
    {
        return [
            'dish_name.required' => 'A dish name is required',
            'category_id.required' => 'A Category name is required',
        ];
    }
}
