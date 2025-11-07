<?php

namespace App\Models;

use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Film extends Model
{
    protected $fillable = [
        'imdbID',
        'Poster',
        'Title',
        'Year',
        'Plot',
        'Genre'
    ];

    public function scopeImdb( $query, $q)
    {
        return $query->where('imdbID',$q);
    }

    /**
     * Get all of the ratings for the Film
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(Rating::class);
    }

}
