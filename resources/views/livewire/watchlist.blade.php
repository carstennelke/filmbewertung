<div>
    <div>
        <h1>Meine Watchlist</h1>
    </div>
    @foreach ($watchListItems as $item)
        <livewire:watchlist-item-row :item="$item" :key="$item->id" />
    @endforeach
</div>
