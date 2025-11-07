<?php

namespace App\Services;

use Exception;
use App\Models\Film;
use App\Http\Resources\FilmResource;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OMdBService
{
    protected string $apiKey;
    protected string $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('omdb.key');
        $this->baseUrl = config('omdb.url');
    }

    /**
     * Search films by title
     * @param string $query
     * @param int $page
     */
    public function searchFilmsByTitle(string $query, int $page = 1): array
    {
        try {
            $cacheKey = "search_" . md5($query . $page); // Result in Cache for Performance
            return Cache::remember($cacheKey, now()->addHours(24), function () use ($query, $page) {
                $response = Http::get($this->baseUrl, [
                    'apikey' => $this->apiKey,
                    's' => $query,
                    'page' => $page,
                    'type' => 'movie'
                ]);
                if ($response->successful() && isset($response['Search'])) {
                    return $response->json();
                }

                throw new Exception($response['Error'] ?? 'Fehler beim Abruf der Filme');
            });
        } catch (Exception $e) {
            throw new Exception('Fehler bei der Film Suche: ' . $e->getMessage());
        }
    }

    /**
     * Get detailed film information by IMDB ID
     */
    public function getFilm(string $imdbId): array
    {
        try {
            $cacheKey = "movie_" . $imdbId;

            return Cache::remember($cacheKey, 3600, function () use ($imdbId) {
                $response = Http::get($this->baseUrl, [
                    'apikey' => $this->apiKey,
                    'i' => $imdbId,
                    'plot' => 'full'
                ]);

                if ($response->successful()) {
                    if($response['Response']==='True')
                    {
                        $this->storeFilmToDatabase($response->json());
                    }
                    return $response->json();
                }

                throw new Exception($response['Error'] ?? 'Fehler beim Abruf der Film Daten');
            });
        } catch (Exception $e) {
            throw new Exception('Fehler beim Abruf der Film Daten: ' . $e->getMessage());
        }
    }

    /**
     * Stores the given Film into local Database
     * @param array $film
     */
    public function storeFilmToDatabase($film): void
    {
        $filmItem = Film::firstOrCreate(FilmResource::toModelArray($film));
    }

}
