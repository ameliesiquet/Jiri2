<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jiri extends Model
{
    use HasFactory;

    protected $casts = [
        'starting_at' => 'date:Y-m-d H:i',
    ];

    protected $fillable = [
        'name',
        'starting_at',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
