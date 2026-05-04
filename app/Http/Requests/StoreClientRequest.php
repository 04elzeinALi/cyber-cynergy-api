<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name'  => ['required', 'string', 'max:255'],
            'industry'      => ['sometimes', 'string', 'max:255'],
            'contact_email' => ['required', 'email', 'unique:clients'],
            'contact_phone' => ['sometimes', 'string', 'max:20'],
            'country'       => ['sometimes', 'string', 'max:100'],
        ];
    }
}