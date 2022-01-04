<?php

namespace App\Controller;

use App\Services\ArtistService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtistController extends AbstractController
{
    /**
     * @Route("/artist/{id}", name="artist")
     */
    public function index(ArtistService  $artistService, $id): Response
    {
        $data = $artistService->get($id);
        return $this->render('artist/index.html.twig', [
            'artist' => $data['artist'],
            'albums' => $data['albums']
        ]);
    }
}
