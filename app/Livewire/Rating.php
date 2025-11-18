<?php

namespace App\Livewire;

use App\Models\Film;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Rating extends Component
{
    public int $userRating;
    public Film $film;
    public bool $isGuest;

    public function mount(Film $film): void
    {
        $this->isGuest = !Auth::check();
        $this->film = $film;
        $this->userRating = $this->getUserRating();
    }

    public function render()
    {
        return view('livewire.rating');
    }

    /**
     * Set the given rating
     * @param int $starsCount
     */
    public function setRating($starsCount): void
    {
        if ($this->isGuest){
            return;
        }
        $userRating = $this->getUserRating();
        if (!$userRating) {
            $userRating = $this->film->users()->attach(auth()->user()->id, [
                'rating' => $starsCount
            ]);
        } else {
            $this->film->users()->updateExistingPivot(auth()->user()->id, [
                'rating' => $starsCount
            ], false);

        }
        $this->userRating = $starsCount;
        $this->film->refresh();
    }

    /**
     * returns the stored rating if existing
     */
    private function getUserRating(): int
    {
        if ($this->isGuest){
            return 0;
        }
        $userRating = $this->film->users()->where('user_id', auth()->user()->id)->first();
        return $userRating ? $userRating->pivot->rating : 0;
    }

}
