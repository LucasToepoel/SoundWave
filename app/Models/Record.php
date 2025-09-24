<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Record extends Model
{
    /** @use HasFactory<\Database\Factories\RecordFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'artist_id',
        'album_id',
        'release_year',
        'genre',
        'label',
        'duration',
        'cover_image_url',
    ];

}
