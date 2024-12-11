<?php

namespace App\Http\Requests\PurchaseDetail;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePurchaseDetailRequest extends FormRequest
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
            'purchase_id'=>[
                'required',
                'integer',
                Rule::exists('purchases', 'id'),
            ],
            'product_id'=>[
                'required',
                'integer',
                Rule::exists('products', 'id'),
            ],
            'price'=>[
                'required',
                'numeric',
            ],
            'quantity'=>[
                'required',
                'integer',
            ],
            'subtotal'=>[
                'required',
                'numeric',
            ],
        ];
    }
}
