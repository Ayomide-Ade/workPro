<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'age',
        'school',
        'department',
        'state',
        'cgpa',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'cgpa'              => 'decimal:2',
        ];
    }

    // ── Relationships ──────────────────────────────

    /**
     * An intern has one application record.
     */
    public function application(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Application::class);
    }

    // ── Helper Methods ─────────────────────────────

    /**
     * Check if the user is an admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    /**
     * Check if the user is an intern.
     */
    public function isIntern(): bool
    {
        return $this->role === 'intern';
    }
}
