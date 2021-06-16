<?php

namespace App\Controller\Admin;

use App\Entity\Slogan;
use App\Form\SloganType;
use App\Repository\SloganRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/slogan", name="admin_slogan_")
 */
class SloganController extends AbstractController
{

    private $manager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->manager = $entityManager;
    }

    /**
     * @Route("/", name="list")
     */
    public function index(SloganRepository $sloganRepository): Response
    {
        return $this->render('admin/slogan/index.html.twig', [
            'slogans' => $sloganRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request): Response
    {
        $slogan = new Slogan();

        $form = $this->createForm(SloganType::class, $slogan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->persist($slogan);
            $this->manager->flush();

            $this->addFlash('success', 'Ajoute avec succes');

            return $this->redirectToRoute('admin_slogan_list');
        }

        return $this->render('admin/slogan/new.html.twig', [
            'sloganForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Slogan $slogan, Request $request): Response
    {
        $form = $this->createForm(SloganType::class, $slogan);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->flush();

            $this->addFlash('success', 'Modifie avec succes');

            return $this->redirectToRoute('admin_slogan_list');
        }

        return $this->render('admin/slogan/edit.html.twig', [
            'sloganForm' => $form->createView()
        ]);
    }
}
