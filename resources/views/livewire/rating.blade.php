<div>
    <div class="text-sm flex justify-between mt-2 text-black">
        <span>durchschnittliche Bewertung: </span>
        <span class="text-lg text-white font-extrabold rounded-md bg-blue-600 px-2">{{ $averageRating }}</span>
    </div>
    @auth
        <div class="flex items-center mt-0 text-gray-800">
            <span class="text-sm">Meine Bewertung:</span>
            <div class="flex items-center ml-2">
                @for ($i = 0; $i < $this->userRating; $i++)
                    <svg wire:click="setRating({{ $i+1 }})" class="w-6 h-6 fill-current text-yellow-400 cursor-pointer"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z">
                        </path>
                    </svg>
                @endfor

                @for ($i = $this->userRating; $i < 10; $i++)
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
