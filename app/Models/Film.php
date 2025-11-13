<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function getAverageRatingAttribute()
    {
        return round($this->users()->avg('rating'),1);
    }

    /**
     * Get all of the ratings for the User
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withPivot('rating');

    }

}
