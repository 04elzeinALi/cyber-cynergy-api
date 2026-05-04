<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuditRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'assigned_to_user_id' => ['sometimes', 'exists:users,id'],
            'scheduled_at'        => ['sometimes', 'date'],
            'status'              => ['sometimes', 'in:scheduled,in_progress,completed,cancelled'],
            'findings'            => ['sometimes', 'string'],
        ];
    }
}