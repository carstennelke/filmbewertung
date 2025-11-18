<div class="w-full text-gray-800">
    <div class="flex flex-1 mb-4 justify-end">
        {{ $films->links() }}
    </div>
    <div>
        @foreach ($films as $film)
        <div class="flex mb-2 gap-4 border bg-white">
            <div class="w-24">
                @if($film['Poster'] !== 'N/A')
                    <img src="{{ $film['Poster'] }}" alt="{{ $film['Title'] }}" class="object-cover w-full h-full">
                @else
                    <div class="flex items-center justify-center p-1 w-full h-full min-h-[100px] bg-gray-200">
                        <div class="text-sm text-gray-400">Kein Plakat vorhanden</div>
                    </div>
                @endif
            </div>
            <div class="flex flex-col pr-4">
                <h1 class=" mb-2 text-xl font-bold">{{ $film->Title }}</h1>
                <livewire:rating :film="$film" :key="$film->id" />
                @auth
                    <livewire:add-to-watchlist-button :film="$film" :key="$film->imdbID" />
                @endauth

            </div>
        </div>
        @endforeach
    </div>

</div>
