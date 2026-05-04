<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'company_name'  => ['sometimes', 'string', 'max:255'],
            'industry'      => ['sometimes', 'string', 'max:255'],
            'contact_email' => ['sometimes', 'email', Rule::unique('clients')->ignore($this->client)],
            'contact_phone' => ['sometimes', 'string', 'max:20'],
            'country'       => ['sometimes', 'string', 'max:100'],
        ];
    }
}