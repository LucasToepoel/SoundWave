<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'genre', 'bio', 'country'];

    public function albums(): BelongsToMany
    {
        return $this->belongsToMany(Album::class, 'album_artist')
            ->withPivot('role')->withTimestamps();
    }

    public function records(): BelongsToMany
    {
        return $this->belongsToMany(Record::class, 'record_artist')
            ->withPivot('role')->withTimestamps();
    }
}
