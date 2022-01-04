<?php

namespace App\Services;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class RequestService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function requests(string $method, string $url, array $headers = [] , array $body = []){
        $response = $this->client->request(
            $method,
            $url,
            [
                'headers' => $headers,
                'body' => $body
            ]
        );
        return $response->toArray();
    }
}