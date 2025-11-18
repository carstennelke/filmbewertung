<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WatchlistItem;

class Watchlist extends Component
{
    public $watchListItems;

    protected $listeners = [
        'watchlistItemDeleted' => '$refresh'
    ];

    public function mount()
    {
        $this->watchListItems = auth()->user()->watchlist;
    }

    public function render()
    {
        return view('livewire.watchlist');
    }

}
