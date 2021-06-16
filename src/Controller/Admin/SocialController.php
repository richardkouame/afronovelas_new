<?php

namespace App\Controller\Admin;

use App\Entity\Social;
use App\Form\SocialType;
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
        $social = new Social();
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->manager->persist($social);
            $this->manager->flush();

            $this->addFlash('success', 'Ajouté avec <strong>succès</strong>');

            return $this->redirectToRoute('admin_social_list');
        }

        return $this->render('admin/social/new.html.twig', [
            'socialForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Social $social, Request $request): Response
    {
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->flush();

            $this->addFlash('success', 'Modifie avec succes');

            return $this->redirectToRoute('admin_social_list');
        }

        return $this->render('admin/social/edit.html.twig', [
            'socialForm' => $form->createView()
        ]);
    }
}
