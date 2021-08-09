<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class NbpApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getExchangeRates(string $params): array
    {
        $response = $this->client->request(
            'GET',
            'http://api.nbp.pl/api/exchangerates/tables/'.$params,
            ['query' => ['format' => 'json']]
        );

        return $response->toArray()[0]['rates'];
    }
}