<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Title' => 'Beta Test (2016)',
            'Poster' => 'https://m.media-amazon.com/images/M/MV5BZjhlM2ZhMzUtMzU4ZC00ZjAyLWIxZmYtOWY4N2RlMWEzYTcwXkEyXkFqcGc@._V1_SX300.jpg',
            'Year' => 2016,
            'Genre' => 'Test',
            'imdbID' => 'tt4244162',
            'Plot' => 'Plot'
        ];
    }

}
