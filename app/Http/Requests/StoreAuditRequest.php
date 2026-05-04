<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAuditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_id'           => ['required', 'exists:clients,id'],
            'assigned_to_user_id' => ['required', 'exists:users,id'],
            'scheduled_at'        => ['required', 'date'],
            'findings'            => ['sometimes', 'string'],
        ];
    }
}