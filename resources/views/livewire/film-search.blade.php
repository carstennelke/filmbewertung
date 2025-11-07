<div class="space-y-4">
    <div class="flex items-center space-x-4">
        <div class="flex-1">
            <input
                type="text"
                wire:model.live.debounce.300ms="search"
                wire:keydown.enter="searchFilms"
                placeholder="Nach Filmen suchen..."
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
            >
        </div>
        <button
            wire:click="searchFilms"
            class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
        >
            Suchen
        </button>
    </div>
    <div>
        {{ Auth::user()->ratings }}
    </div>
    @error('search')
        <div class="text-red-500">{{ $message }}</div>
    @enderror

    <div wire:loading wire:target="searchFilms" class="text-gray-500">
        Suchen...
    </div>
    @if($results && isset($results['Search']))
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($results['Search'] as $film)
                <div class="overflow-hidden bg-white rounded-lg shadow-lg" wire:key="{{ $film['imdbID'] }}">
                    @if($film['Poster'] !== 'N/A')
                        <img src="{{ $film['Poster'] }}" alt="{{ $film['Title'] }}" class="object-contain w-full h-64">
                    @else
                        <div class="flex items-center justify-center w-full h-64 bg-gray-200">
                            <span class="text-gray-400">Kein Filmplakat verfügbar</span>
                        </div>
                    @endif
                    <div class="p-4">
                        <h3 class="mb-2 text-xl text-gray-600 font-semibold">{{ $film['Title'] }}</h3>
                        <p class="text-gray-600">Jahr: {{ $film['Year'] }}</p>
                        <p class="text-gray-500 text-sm">ID: {{ $film['imdbID'] }}</p>
                        <a
                            href="{{ route('film.detail', ['id'=>$film['imdbID']] ) }}"
                            class="inline-block px-4 py-2 mt-4 text-sm text-white bg-blue-600 rounded hover:bg-blue-700"
                        >
                            Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        @if(isset($results['totalResults']) && $results['totalResults'] > count($results['Search']))
            <div class="mt-4 text-center">
                <button
                    wire:click="loadMore"
                    class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700"
                >
                    Mehr laden...
                </button>
            </div>
        @endif
    @endif
</div>
