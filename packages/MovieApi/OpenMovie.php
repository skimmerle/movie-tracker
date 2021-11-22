<?php

declare(strict_types=1);

namespace Skimmerle\MovieApi;

use GuzzleHttp\Exception\GuzzleException;
use Skimmerle\MovieApi\Clients\OpenMovieClient;
use Skimmerle\MovieApi\Contracts\MovieApi;
use Skimmerle\MovieApi\Models\Movie;

class OpenMovie implements MovieApi
{
    private OpenMovieClient $client;

    public function __construct(OpenMovieClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $title
     * @return Movie[]
     * @throws GuzzleException
     */
    public function searchByTitle(string $title): array
    {
        return $this->client->sendSearchRequest('/', [
            'query' => [
                's' => $title,
                'r' => 'json',
            ],
        ]);
    }
}
