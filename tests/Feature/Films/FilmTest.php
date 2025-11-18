<?php

use App\Models\Film;
use App\Models\User;
use Livewire\Livewire;
use App\Livewire\Rating;
use App\Livewire\FilmSearch;

test('user-can-see-search-films-page', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/search')->assertOk();
});
test('user-can-see-watchlist-page', function () {
    $this->actingAs($user = User::factory()->create());

    $this->get('/watchlist')->assertOk();
});
test('user-can-enter-film-search-word', function () {
    $user = User::factory()->create();
    Livewire::actingAs($user)
            ->test(FilmSearch::class)
            ->set('search', 'johnny')
            ->assertSet('search', 'johnny');
});
test('user-can-search-film', function () {
    $user = User::factory()->create();

    Livewire::actingAs($user)
            ->test(FilmSearch::class)
            ->set('search', 'Despicable Me 2: 3 Mini-Movie Collection')
            ->call('searchFilms')
            ->assertCount('results.Search',1);
});
test('user-can-see-film-details', function () {
    $user = User::factory()->create();
    $film = Film::factory()->create();

    $this->actingAs($user);

    $this->get('/detail?id=tt4244162')->assertOk();

});
test('user-can-rate-film', function () {
    $user = User::factory()->create();
    $film = Film::factory()->create();

    Livewire::actingAs($user)
            ->test(Rating::class, ['film'=> $film])
            ->call('setRating',2)
            ->assertSet('userRating',2);
});
