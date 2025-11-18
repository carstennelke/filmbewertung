<?php

namespace App\Livewire;

use App\Models\Film;
use App\Models\User;
use Livewire\Component;
use App\Models\WatchlistItem;

class AddToWatchlistButton extends Component
{
    public Film $film;

    public function mount(Film $film)
    {
        $this->film = $film;
    }

    /**
     * Add given Film to users wtachlist
     * @param Film $film
     */
    public function addToWatchlist(Film $film): void
    {
        auth()->user()->watchlist()->updateOrCreate([
            'film_id' => $film->id,
        ]);
    }

    public function render()
    {
        return view('livewire.add-to-watchlist-button');
    }

}
