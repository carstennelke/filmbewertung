<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\OMdBService;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;


class FilmSearch extends Component
{
    use WithPagination;

    public string $search = '';
    public ?array $results = null;
    public int $page = 1;
    public bool $isLoading = false;

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function searchFilms()
    {
        if (strlen($this->search) < 3) {
            return;
        }

        try {
            $this->isLoading = true;
            $omdb = new OMdBService();
            $this->results = $omdb->searchFilmsByTitle($this->search, $this->page);
        } catch (\Exception $e) {
            $this->addError('search', $e->getMessage());
        } finally {
            $this->isLoading = false;
        }
    }

    public function loadMore()
    {
        $this->page++;
        $this->searchFilms();
    }

    public function render()
    {
        return view('livewire.film-search');
    }
}
