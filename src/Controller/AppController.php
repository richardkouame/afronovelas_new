<?php

namespace App\Controller;

use App\Repository\ProgramRepository;
use App\Repository\SerieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(ProgramRepository $programRepository, SerieRepository $serieRepository): Response
    {

        return $this->render('front/index.html.twig', [
            'controller_name' => 'AppController',
            'banner_data' => $programRepository->findAll(),
            'bouquets' => null,
            'novelas' => $serieRepository->findAll(),
            'tvguide' => null
        ]);
    }
}
