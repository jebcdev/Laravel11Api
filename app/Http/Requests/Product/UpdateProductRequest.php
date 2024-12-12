<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
            'brand_id' => [
                'sometimes',
                'required',
                Rule::exists('brands', 'id'),
            ],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'name')->ignore($this->product),
            ],
            'description' => [
                'sometimes',
                'required',
                'string',
            ],
            'price' => [
                'sometimes',
                'required',
                'numeric',
            ],
            'stock' => [
                'sometimes',
                'required',
                'integer',
            ],
        ];
    }
}
