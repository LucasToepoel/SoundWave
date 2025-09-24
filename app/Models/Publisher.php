<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publisher extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country'];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
    public function records(): HasMany
    {
        return $this->hasMany(Record::class);
    }
}
