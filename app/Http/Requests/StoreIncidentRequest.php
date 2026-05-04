<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIncidentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id'            => ['required', 'exists:clients,id'],
            'title'                => ['required', 'string', 'max:255'],
            'description'          => ['sometimes', 'string'],
            'severity'             => ['sometimes', 'in:low,medium,high,critical'],
            'assigned_to_user_id'  => ['sometimes', 'exists:users,id'],
        ];
    }
}