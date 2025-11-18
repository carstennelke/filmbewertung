<?php

namespace App\Models;

use App\Models\Film;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WatchlistItem extends Model
{
    protected $fillable = [
        'film_id',
        'user_id'
    ];

    protected $with = [
        'film'
    ];

    public function scopeIsUser($query, $userId)
    {
        return $query->where('user_id',$userId);
    }
    public function scopeIsFilm($query, $filmId)
    {
        return $query->where('film_id',$filmId);
    }
    public function getIsOnUsersWatchlistAttribute()
    {
        return $this->user_id === auth()->user()->id;
    }

    /**
     * Get the user of the WatchlistItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Get the film of the WatchlistItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class);
    }
}
