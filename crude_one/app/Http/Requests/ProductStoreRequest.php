<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
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
            'category_name' => ['required', 'numeric'],
            'subcategory_name' => ['required', 'numeric'],
            'name' => ['required', 'string', 'max:250'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['nullable', 'string'],
            'image' => ['required', 'max:1024', 'mimes:jpg,png,jpeg'],
            'is_active' => 'nullable'
        ];
    }
}
