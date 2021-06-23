<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'AppController',
            'banner_data' => null,
            'bouquets' => null,
            'novelas' => null,
            'tvguide' => null
        ]);
    }
}
