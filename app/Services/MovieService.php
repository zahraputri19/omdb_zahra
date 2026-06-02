<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MovieService
{
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('omdb.api_key');
        $this->baseUrl = config('omdb.base_url', 'https://www.omdbapi.com/');
    }

    public function search($query, $page = 1)
    {
        try {

            if (empty($this->apiKey)) {
                Log::error('OMDB API Key tidak ditemukan.');
                return false;
            }

            $response = Http::timeout(30)->get($this->baseUrl, [
                'apikey' => $this->apiKey,
                's'      => $query,
                'page'   => $page,
                'type'   => 'movie',
            ]);

            if (!$response->successful()) {
                Log::error('OMDB HTTP Error', [
                    'status' => $response->status(),
                    'body'   => $response->body()
                ]);

                return false;
            }

            $data = $response->json();

            Log::info('OMDB Search Response', $data);

            if (
                isset($data['Response']) &&
                $data['Response'] === 'True'
            ) {
                return [
                    'movies' => $data['Search'] ?? [],
                    'total'  => (int) ($data['totalResults'] ?? 0),
                    'error'  => null,
                ];
            }

            return [
                'movies' => [],
                'total'  => 0,
                'error'  => $data['Error'] ?? 'Film tidak ditemukan.',
            ];

        } catch (\Throwable $e) {

            Log::error('OMDB Search Error', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
                'file'    => $e->getFile(),
            ]);

            return false;
        }
    }

    public function detail($imdbId)
    {
        try {

            if (empty($this->apiKey)) {
                Log::error('OMDB API Key tidak ditemukan.');
                return false;
            }

            $response = Http::timeout(30)->get($this->baseUrl, [
                'apikey' => $this->apiKey,
                'i'      => $imdbId,
                'plot'   => 'full',
            ]);

            if (!$response->successful()) {
                Log::error('OMDB Detail HTTP Error', [
                    'status' => $response->status(),
                    'body'   => $response->body()
                ]);

                return false;
            }

            $data = $response->json();

            Log::info('OMDB Detail Response', $data);

            if (
                isset($data['Response']) &&
                $data['Response'] === 'True'
            ) {
                return $data;
            }

            return false;

        } catch (\Throwable $e) {

            Log::error('OMDB Detail Error', [
                'message' => $e->getMessage(),
                'line'    => $e->getLine(),
                'file'    => $e->getFile(),
            ]);

            return false;
        }
    }
}