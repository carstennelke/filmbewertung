<div>
    @if (!$film->isOnUsersWatchlist)
        <button wire:click="addToWatchlist({{ $film->id }})"
            class="p-3 rounded cursor-pointer bg-green-300">
            Zur Watchlist hinzufügen
        </button>
    @endif
</div>
