<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public static function toModelArray($film): array
    {
        return [
            'imdbID'    => $film['imdbID'],
            'Poster'    => $film['Poster'],
            'Title'     => $film['Title'],
            'Year'      => $film['Year'],
            'Plot'      => $film['Plot'],
            'Genre'     => $film['Genre'],
        ];
    }
}
