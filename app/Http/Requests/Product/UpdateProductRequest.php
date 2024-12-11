<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'brand_id' => [
                'required',
                Rule::exists('brands', 'id'),
            ],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($this->product),
            ],
            'description' => [
                'required',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
            ],
            'stock' => [
                'required',
                'integer',
            ],
        ];
    }
}
