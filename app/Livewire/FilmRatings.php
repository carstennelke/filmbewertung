<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Collection;

class FilmRatings extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.film-ratings', [
            'films' => Film::isRated()->paginate(5),
        ]);
    }
}
