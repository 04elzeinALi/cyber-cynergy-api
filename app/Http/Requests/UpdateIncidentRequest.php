<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIncidentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title'               => ['sometimes', 'string', 'max:255'],
            'description'         => ['sometimes', 'string'],
            'severity'            => ['sometimes', 'in:low,medium,high,critical'],
            'status'              => ['sometimes', 'in:open,investigating,resolved,closed'],
            'assigned_to_user_id' => ['sometimes', 'exists:users,id'],
        ];
    }
}