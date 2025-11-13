<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;
use Livewire\Attributes\Url;
use App\Services\OMdBService;

class FilmDetail extends Component
{
    #[Url]
    public string $id = '';
    public bool $isLoading = false;
    public $film = null;
    public $localFilm = null;
    public $rating = null;

    public function mount()
    {
        $this->getFilm();
    }

    public function getFilm()
    {
        try {
            $this->isLoading = true;
            $omdb = new OMdBService();
            $this->film = $omdb->getFilm($this->id);
            if( $this->film['Response']==='False')
            {
                throw new \Exception($this->film['Error'] ?? 'Fehler beim Abruf der Film Daten');
            }
            $this->localFilm = Film::with('users')->imdb($this->film['imdbID'])->first();
        } catch (\Exception $e) {
            $this->addError('film', $e->getMessage());
        } finally {
            $this->isLoading = false;
        }
    }

    public function render()
    {
        return view('livewire.film-detail');
    }
}
