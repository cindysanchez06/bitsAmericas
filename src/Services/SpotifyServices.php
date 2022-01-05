<?php

namespace App\Services;

use http\Env;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpotifyServices
{
    private $client;
    private $apiAuth = 'https://accounts.spotify.com/api';
    private $api = 'https://api.spotify.com/v1';
    /**
     * @var RequestService
     */
    private $requestService;

    public function __construct(RequestService $requestService)
    {
        $this->requestService = $requestService;
    }

    public function auth()
    {
        $clientId = $_ENV['CLIENT_ID_SPOTIFY'];
        $clientSecret = $_ENV['CLIENT_SECRET_SPOTIFY'];
        $response = $this->requestService->requests('POST',
            $this->apiAuth . '/token',
            [
                'Authorization' => 'Basic ' . base64_encode($clientId . ':' . $clientSecret),
                'Content-Type' => 'application/x-www-form-urlencoded'
            ],
            [
                'grant_type' => 'client_credentials'
            ]
        );
        return $response['access_token'];
    }

    public function getReleases(): array
    {
        $url = $this->api.'/browse/new-releases';
        $method = 'GET';
        $headers = [
            'Authorization' => 'Bearer '.$this->auth(),
        ];
        return $this->requestService->requests($method, $url, $headers);
    }

    public function getArtist(string $id): array
    {
        $url = $this->api.'/artists/'.$id;
        $method = 'GET';
        $headers = [
            'Authorization' => 'Bearer '.$this->auth(),
        ];
        return $this->requestService->requests($method, $url, $headers);
    }

    public function getAlbumByArtist(string $id): array
    {
        $url = $this->api.'/artists/'.$id.'/albums';
        $method = 'GET';
        $headers = [
            'Authorization' => 'Bearer '.$this->auth(),
        ];
        return $this->requestService->requests($method, $url, $headers);
    }

    public function getTracksByAlbum(string $id){

        $url = $this->api.'/albums/'.$id.'/tracks';
        $method = 'GET';
        $headers = [
            'Authorization' => 'Bearer '.$this->auth(),
        ];
        return $this->requestService->requests($method, $url, $headers);
    }
}