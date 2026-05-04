<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Incidents this user reported
    public function reportedIncidents(): HasMany
    {
        return $this->hasMany(Incident::class, 'reported_by_user_id');
    }

    // Incidents assigned to this user
    public function assignedIncidents(): HasMany
    {
        return $this->hasMany(Incident::class, 'assigned_to_user_id');
    }

    // Audits assigned to this user
    public function audits(): HasMany
    {
        return $this->hasMany(Audit::class, 'assigned_to_user_id');
    }

    // Comments written by this user
    public function comments(): HasMany
    {
        return $this->hasMany(IncidentComment::class);
    }
}