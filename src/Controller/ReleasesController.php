<?php

namespace App\Controller;

use App\Services\ReleasesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReleasesController extends AbstractController
{
    /**
     * @Route("/", name="releases")
     */
    public function index(ReleasesService $releasesService): Response
    {
        $releases = $releasesService->get();
        return $this->render('releases/index.html.twig', [
            'controller_name' => 'ReleasesController',
            'releases' => $releases
        ]);
    }
}
