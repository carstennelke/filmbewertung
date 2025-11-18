<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WatchlistItem;

class WatchlistItemRow extends Component
{
    public $item;

    public function mount(WatchlistItem $item)
    {
        $this->item = $item;
    }

    public function render()
    {
        return view('livewire.watchlist-item-row');
    }

    /**
     * Delete Watchlist item
     * @param WatchlistItem $item
     */
    public function removeItem(WatchlistItem $item): void
    {
        $item->delete();
        $this->dispatch('watchlistItemDeleted');
    }

}
