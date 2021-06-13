<?php

namespace App\Controller\Admin;

use App\Repository\SocialRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/social", name="admin_social_")
 */
class SocialController extends AbstractController
{
    private $manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    /**
     * @Route("/", name="list")
     */
    public function index(SocialRepository $socialRepository): Response
    {
        return $this->render('admin/social/index.html.twig', [
            'controller_name' => 'SocialController',
            'socials' => $socialRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request): Response
    {
        //$social
    }
}
