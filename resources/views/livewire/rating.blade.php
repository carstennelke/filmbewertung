<div class="mb-4">
    <div class="text-sm flex flex-col items-start justify-between mb-1 text-black">
        <div class="flex items-center mb-2 px-2 gap-1 text-lg text-white font-extrabold rounded-md bg-gray-600">
            <span class="text-sm font-light text-gray-300">&#x2300;</span>
            <span>{{ $film->averageRating }}</span>
            <svg class="w-3 h-3 fill-current text-gray-200"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                </path>
            </svg>
        </div>
    </div>
    @auth
        <div class="flex flex-col items-start justify-between text-gray-500">
            @if ($userRating)
                <div class="w-36 mb-2 text-xs">Meine Bewertung:</div>
            @else
                <div class="w-36 mb-2 text-xs">bewerten:</div>
            @endif
            <div class="flex items-center">
                @for ($i = 0; $i < $userRating; $i++)
                    <svg wire:click="setRating({{ $i+1 }})" class="w-6 h-6 fill-current text-yellow-400 cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                        </path>
                    </svg>
                @endfor

                @for ($i = $userRating; $i < 10; $i++)
                    <svg wire:click="setRating({{ $i+1 }})" class="w-6 h-6 fill-current text-gray-400 cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                        </path>
                    </svg>
                @endfor
            </div>
        </div>
    @endauth
</div>
