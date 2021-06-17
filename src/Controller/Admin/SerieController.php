<?php

namespace App\Controller\Admin;

use App\Entity\Program;
use App\Entity\Serie;
use App\Form\SerieType;
use App\Repository\SerieRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/serie", name="admin_serie_")
 */
class SerieController extends AbstractController
{
    /**
     * @Route("/", name="liste")
     */
    public function index(SerieRepository $serieRepository): Response
    {

        return $this->render('admin/serie/index.html.twig', [

            'series' => $serieRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader): Response
    {
        $serie = new Serie();

        $form = $this->createForm(SerieType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $serie->setUser($this->getUser());

            $imageFile = $form->get('imageFile')->getData();
            $fileUploader->setTargetDirectory($this->getParameter('series_directory'));

            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile, $serie->getTitle());
                $serie->setImage($imageFileName);
            }

            $entityManager->persist($serie);
            $entityManager->flush();

            $this->addFlash('success', 'Série ajoutée avec <strong>succès</strong>');

            return $this->redirectToRoute('admin_serie_liste');
        }

        return $this->render("admin/serie/new.html.twig", [
            'serieForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     * @return Response
     */
    public function edit(Serie $serie, Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(SerieType::class, $serie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('imageFile')->getData();
            $fileUploader->setTargetDirectory($this->getParameter('series_directory'));

            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile, $serie->getTitle());
                $serie->setImage($imageFileName);
            }

            $entityManager->persist($serie);
            $entityManager->flush();

            $this->addFlash('success', 'Série modifiée avec <strong>succès</strong>');

            return $this->redirectToRoute('admin_serie_liste');
        }

        return $this->render("admin/serie/new.html.twig", [
            'serieForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"POST"})
     */
    public function delete(Serie $serie, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('serie'.$serie->getId(), $request->request->get('_csrf_token'))) {

            unlink($this->getParameter('series_directory') . '/' . $serie->getImage());
            $entityManager->remove($serie);
            $entityManager->flush();

            $this->addFlash('success', 'Supprime avec succes');

            return $this->redirectToRoute('admin_serie_liste');
        }

        return $this->redirectToRoute('admin_serie_liste');
    }
}
