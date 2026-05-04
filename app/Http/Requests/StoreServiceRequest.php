<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'max:255'],
            'slug'        => ['required', 'string', 'unique:services', 'max:255'],
            'description' => ['sometimes', 'string'],
            'price'       => ['required', 'numeric', 'min:0'],
        ];
    }
}