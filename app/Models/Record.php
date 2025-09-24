<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class Record extends Model
{
    use HasFactory;

    // Add 'file_path' to the fillable properties
    protected $fillable = ['title', 'file_path', 'album_id', 'publisher_id', 'track_number', 'duration_ms', 'is_explicit'];

    // Define relationships as before
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
     * This method encapsulates all the business logic for creating a record.
     *
     * @param Request $request
     * @return Record
     */
    public static function createWithFileAndMetadata(Request $request): self
    {
        // Step 1: Validate the incoming data from the request
        $validated = $request->validate([
            'title' => 'required|string',
            'music_file' => 'required|file|mimes:mp3,wav,ogg',
            'album_id' => 'required|exists:albums,id',
            'publisher_id' => 'required|exists:publishers,id',
            'track_number' => 'nullable|integer',
            'is_explicit' => 'boolean',
        ]);

        // Step 2: Store the uploaded file securely
        $filePath = $request->file('music_file')->store('music', 'local');

        // Step 3: Create the record in the database
        $record = self::create([
            'title' => $validated['title'],
            'file_path' => $filePath,
            'album_id' => $validated['album_id'],
            'publisher_id' => $validated['publisher_id'],
            'track_number' => $validated['track_number'],
            'duration_ms' => 0, // In a real app, you would parse the audio file for this.
            'is_explicit' => $request->has('is_explicit'),
        ]);

        // Step 4: Sync artists (if applicable for a many-to-many relationship)
        // This is a placeholder; you would need a form field for artist IDs.
        // $record->artists()->sync($request->artists);

        return $record;
    }

    /**
     * Delete the record and its associated file.
     */
    public function deleteWithFile(): bool|null
    {
        // Check if a file path exists and the file exists on the disk
        if ($this->file_path && Storage::disk('local')->exists($this->file_path)) {
            Storage::disk('local')->delete($this->file_path);
        }

        // Now, delete the record from the database
        return $this->delete();
    }
}
