<?php

namespace App\Services;

class ReleasesService
{
    /**
     * @var SpotifyServices
     */
    private $spotifyServices;

    public function __construct(SpotifyServices $spotifyServices)
    {
        $this->spotifyServices = $spotifyServices;
    }

    public function get(){
        $items = $this->spotifyServices->getReleases();
        return $items['albums']['items'];
    }
}