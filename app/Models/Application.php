<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'role_applied_for',
        'admin_notes',
        'reviewed_at',
    ];

    protected function casts(): array
    {
        return [
            'reviewed_at' => 'datetime',
        ];
    }

    // ── Relationships ──────────────────────────────

    /**
     * An application belongs to one user (the intern).
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // ── Helper Methods ─────────────────────────────

    public function isPending(): bool
    {
        return $this->status === 'pending';
    }

    public function isApproved(): bool
    {
        return $this->status === 'approved';
    }

    public function isRejected(): bool
    {
        return $this->status === 'rejected';
    }

    /**
     * Human-readable status label with colour hint for the view layer.
     */
    public function statusLabel(): array
    {
        return match($this->status) {
            'approved' => ['label' => 'Approved',  'color' => 'green'],
            'rejected' => ['label' => 'Rejected',  'color' => 'red'],
            default    => ['label' => 'Pending',   'color' => 'yellow'],
        };
    }
}
