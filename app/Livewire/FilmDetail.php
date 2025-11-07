<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Url;
use App\Services\OMdBService;

class FilmDetail extends Component
{
    #[Url]
    public string $id = '';
    public bool $isLoading = false;
    public $film = null;

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
