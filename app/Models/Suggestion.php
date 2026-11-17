<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Suggestion extends Model
{
    public const PENDING  = 'pending';
    public const REVIEW   = 'review';
    public const RESOLVED = 'resolved';
    public const REJECTED = 'rejected';

    protected $fillable = ['user_id', 'department_id', 'message', 'status'];

    // Hide the sender whenever a suggestion is converted to JSON/array
    protected $hidden = ['user_id'];

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    // Only used for the student's own "My suggestions" list.
    // Never load this in staff or admin views.
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
