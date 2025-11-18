<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rating;
use App\Models\WatchlistItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    use HasFactory;

    protected $fillable = [
        'imdbID',
        'Poster',
        'Title',
        'Year',
        'Plot',
        'Genre'
    ];

    protected $appends = [
        'isOnUsersWatchlist'
    ];

    public function scopeImdb( $query, $q)
    {
        return $query->where('imdbID',$q);
    }
    public function scopeIsRated( $query)
    {
        return $query->whereHas('users');
    }

    public function getAverageRatingAttribute()
    {
        return round($this->users()->avg('rating'),1);
    }

    public function getIsOnUsersWatchlistAttribute()
    {
        return auth()->user() ? $this->watchlistitems()->where('user_id', auth()->user()->id)->count() > 0 : false;
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
    /**
     * Get all of the watchlistitems for the film
     *
     * @return HasMany
     */
    public function watchlistitems(): HasMany
    {
        return $this->hasMany(WatchlistItem::class);
    }


}
