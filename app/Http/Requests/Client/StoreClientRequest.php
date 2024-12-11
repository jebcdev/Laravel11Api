<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreClientRequest extends FormRequest
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
            'dni' => [
                'required',
                'string',
                'max:100',
                'unique:clients,dni',
            ],
            'name' => [
                'required',
                'string',
                'max:100',
            ],
            'saurname' => [
                'required',
                'string',
                'max:100',
            ],
            'email' => [
                'required',
                'string',
                'max:100',
                'unique:clients,email',
            ],
            'phone' => [
                'required',
                'string',
                'max:100',
            ],
            'address' => [
                'required',
                'string',
                'max:100',
            ],
        ];
    }
}
