<div class="max-w-4xl mx-auto">
    @if($isLoading)
        <div class="flex items-center justify-center min-h-[400px]">
            <div class="text-gray-500">Details werden abgerufen...</div>
        </div>
    @elseif($film && $film['Response']==='True')
        <div class="overflow-hidden bg-white rounded-lg shadow-lg">
            <div class="md:flex">
                <div class="md:w-1/2">
                    @if($film['Poster'] !== 'N/A')
                        <img src="{{ $film['Poster'] }}" alt="{{ $film['Title'] }}" class="object-cover w-full h-full">
                    @else
                        <div class="flex items-center justify-center w-full h-full min-h-[400px] bg-gray-200">
                            <span class="text-gray-400">Kein Plakat vorhanden</span>
                        </div>
                    @endif
                </div>
                <div class="p-6 md:w-1/2">
                    <h1 class="mb-4 text-3xl font-bold text-black">{{ $film['Title'] }} ({{ $film['Year'] }})</h1>

                    <div class="grid gap-4 mb-6">


                        <div>
                            <h2 class="font-semibold text-gray-600">Handlung</h2>
                            <p class="text-gray-700">{{ $film['Plot'] }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h2 class="font-semibold text-gray-600">Regie</h2>
                                <p class="text-gray-700">{{ $film['Director'] }}</p>
                            </div>

                            <div>
                                <h2 class="font-semibold text-gray-600">Genre</h2>
                                <p class="text-gray-700">{{ $film['Genre'] }}</p>
                            </div>

                            <div>
                                <h2 class="font-semibold text-gray-600">Spielzeit</h2>
                                <p class="text-gray-700">{{ $film['Runtime'] }}</p>
                            </div>

                            <div>
                                <h2 class="font-semibold text-gray-600">Veröffentlichung</h2>
                                <p class="text-gray-700">{{ $film['Released'] }}</p>
                            </div>
                        </div>

                        <div>
                            <h2 class="font-semibold text-gray-600">Besetzung</h2>
                            <p class="text-gray-700">{{ $film['Actors'] }}</p>
                        </div>
                    </div>

                    <a
                        href="{{ route('films.index') }}"
                        class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700"
                    >
                        Zurück zur Suche
                    </a>
                    <livewire:rating :film="$localFilm" :key="$localFilm->id" />
                </div>
            </div>
        </div>
    @else
        <div class="p-4 text-red-500">
            @error('film')
                {{ $message }}
            @else
                Film nicht gefunden
            @enderror
        </div>
    @endif
</div>
