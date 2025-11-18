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

    /**
     * Search for Films in OMdB
     */
    public function searchFilms(): void
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

    /**
     * Get more Film Entries based on search
     */
    public function loadMore(): void
    {
        $this->page++;
        $this->searchFilms();
    }

    public function render()
    {
        return view('livewire.film-search');
    }
}
