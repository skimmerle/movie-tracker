<?php

declare(strict_types=1);

namespace Skimmerle\MovieApi\Clients;

use Exception;
use GuzzleHttp\Client;
use Skimmerle\MovieApi\Models\Movie;

class OpenMovieClient
{
    private Client $client;
    private string $apiKey;

    public function __construct(Client $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $url
     * @param array  $config
     * @return Movie[]
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function sendSearchRequest(string $url, array $config): array
    {
        //add apiKey to url
        $response = $this->client->get($url, $this->addDefaultParameters($config));

        $content = json_decode($response->getBody()->getContents(), true);
        if (empty($content)) {
            return [];
        }
        if(data_get($content, 'Response') === false) {
            throw new Exception(data_get($content, 'Error', 'Error happened during search request'));
        }
        if(empty(data_get($content, 'Search')) || !is_array(data_get($content, 'Search'))) {
            return [];
        }

        $movies = array_map(function (array $movie) {
            return Movie::createByArray($movie);
        }, data_get($content, 'Search'));

        //remove null values from array
        return array_filter($movies);
    }

    private function addDefaultParameters(array $config): array
    {
        data_set($config, 'query.apikey', $this->apiKey);

        return $config;
    }
}
