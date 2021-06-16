<?php

namespace App\Controller\Admin;

use App\Entity\FooterBanner;
use App\Form\FooterBannerType;
use App\Repository\FooterBannerRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/admin/footer/banner", name="admin_footer_banner_")
 */
class FooterBannerController extends AbstractController
{
    private $manager;

    public function __construct(EntityManagerInterface  $entityManager)
    {
        $this->manager = $entityManager;
    }

    /**
     * @Route("/", name="list")
     */
    public function index(FooterBannerRepository $footerBannerRepository): Response
    {
        return $this->render('admin/footer_banner/index.html.twig', [
            'footerBanners' => $footerBannerRepository->findAll()
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $footerBanner = new FooterBanner();

        $form = $this->createForm(FooterBannerType::class, $footerBanner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $fileUploader->setTargetDirectory($this->getParameter('footer_banner_directory'));

            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile);
                $footerBanner->setImage($imageFileName);
            }

            $this->manager->persist($footerBanner);
            $this->manager->flush();

            $this->addFlash('success', 'Ajoute avec succes');

            return $this->redirectToRoute('admin_footer_banner_list');
        }

        return $this->render('admin/footer_banner/new.html.twig', [
            'footerBannerForm' => $form->createView()
        ]);

    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(FooterBanner $footerBanner, Request $request, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(FooterBannerType::class, $footerBanner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $fileUploader->setTargetDirectory($this->getParameter('footer_banner_directory'));

            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile);
                $footerBanner->setImage($imageFileName);
            }

            $this->manager->persist($footerBanner);
            $this->manager->flush();

            $this->addFlash('success', 'Modifie avec succes');

            return $this->redirectToRoute('admin_footer_banner_list');
        }

        return $this->render('admin/footer_banner/edit.html.twig', [
            'footerBannerForm' => $form->createView()
        ]);

    }
}
