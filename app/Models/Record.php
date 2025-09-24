<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'album_id', 'publisher_id', 'track_number', 'duration_ms', 'is_explicit'];

    public function album(): BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function publisher(): BelongsTo
    {
        return $this->belongsTo(Publisher::class);
    }

    public function artists(): BelongsToMany
    {
        return $this->belongsToMany(Artist::class, 'record_artist')
            ->withPivot('role')->withTimestamps();
    }
}
