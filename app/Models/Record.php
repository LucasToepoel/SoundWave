<?php

namespace App\Models;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Model;zx
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class Record extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'file_path', 'album_id', 'publisher_id', 'track_number', 'duration_ms', 'is_explicit'];

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

    /**
     * Create a new record and store the associated music file.
     *
     * @param Request $request
     * @return Record
     */
    public static function createWithFileAndMetadata(Request $request): self
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'music_file' => 'required|file|mimes:mp3,wav,ogg',
            'album_title' => 'required|string',
            'publisher_name' => 'required|string',
            'track_number' => 'nullable|integer',
            'is_explicit' => 'boolean',
        ]);

        $filePath = $request->file('music_file')->store('music', 'local');

        $record = self::query()->create([
            'title' => $validated['title'],
            'file_path' => $filePath,
            'album_id' => Album::query()->firstOrCreate(['title' => $validated['album_title']])->getKey(),
            'publisher_id' => Publisher::query()->firstOrCreate(['name' => $validated['publisher_name']])->getKey(),
            'track_number' => $validated['track_number'],
            'duration_ms' => 0,
            'is_explicit' => $request->has('is_explicit'),
        ]);

        // $record->artists()->sync($request->artists);

        return $record;
    }

    /**
     * Delete the record and its associated file.
     */
    public function deleteWithFile(): bool|null
    {
        if ($this->file_path && Storage::disk('local')->exists($this->file_path)) {
            Storage::disk('local')->delete($this->file_path);
        }

        return $this->delete();
    }
}
