<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
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
                Rule::unique('clients', 'dni')->ignore($this->client),
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
                Rule::unique('clients', 'email')->ignore($this->client),
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
