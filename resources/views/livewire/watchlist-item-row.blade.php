<div class="flex mb-2 gap-4 border rounded-lg bg-white">
    <div class="w-24 overflow-hidden">
        @if($item->film->Poster !== 'N/A')
            <img src="{{ $item->film->Poster }}" alt="{{ $item->film->Title }}" class="object-contain w-full">
        @else
            <div class="flex items-center justify-center p-1 w-full h-full min-h-[100px] bg-gray-200">
                <div class="text-sm text-gray-400">Kein Plakat vorhanden</div>
            </div>
        @endif
    </div>
    <div class="flex flex-col justify-between pb-2">
        <h3 class="mb-2 text-xl text-gray-600 font-semibold">{{ $item->film->Title }}</h3>
        <button wire:click="removeItem({{ $item->id }})"
            class="bg-red-800 text-white cursor-pointer p-2 rounded">
            von Watchlist entfernen
        </button>
    </div>
</div>
