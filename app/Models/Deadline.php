<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Deadline extends Model
{
    use HasFactory;

    protected $fillable = [
        'exceeds_at',
        'postponed_id',
    ];

    protected $casts = [
        'exceeds_at' => 'datetime',
    ];

    public function postponed(): BelongsTo
    {
        return $this->belongsTo(Deadline::class);
    }

    public function postpones(): HasOne
    {
        return $this->hasOne(Deadline::class, 'postponed_id');
    }
}
