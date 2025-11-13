<div class="text-white">
    <div class="">
        @foreach ($films as $film)
        <div class="flex mb-2 gap-4">
            <div class="w-24">
                @if($film['Poster'] !== 'N/A')
                    <img src="{{ $film['Poster'] }}" alt="{{ $film['Title'] }}" class="object-cover w-full h-full">
                @else
                    <div class="flex items-center justify-center p-1 w-full h-full min-h-[100px] bg-gray-200">
                        <div class="text-sm text-gray-400">Kein Plakat vorhanden</div>
                    </div>
                @endif
            </div>
            <div class="flex flex-col">
                <h1 class="mb-4 text-xl font-bold">{{ $film->Title }}</h1>
                <livewire:rating :film="$film" :key="$film->id" />
            </div>
        </div>
        @endforeach
    </div>

    {{ $films->links() }}
</div>
