<?php

namespace App\Controller\Admin;

use App\Entity\TvChanel;
use App\Form\TvChannelType;
use App\Repository\TvChanelRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


/**
 * @Route("/admin/tv-channel", name="admin_tvchannel_")
 */
class TvChannelController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="list")
     */
    public function index(TvChanelRepository $tvChanelRepository): Response
    {
        return $this->render('admin/tv_channel/index.html.twig', [
            'tvChannels' => $tvChanelRepository->findAll(),
            'controller_name' => 'TvChannelController',
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request, FileUploader $fileUploader): Response
    {
        $tvChannel = new TvChanel();

        $form = $this->createForm(TvChannelType::class, $tvChannel);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            $fileUploader->setTargetDirectory($this->getParameter('bouquets_directory'));

            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile, $tvChannel->getTitle());
                $tvChannel->setImage($imageFileName);
            }

            $this->entityManager->persist($tvChannel);
            $this->entityManager->flush();

            $this->addFlash('success', 'Ajouté avec succès');

            return $this->redirectToRoute('admin_tvchannel_list');
        }

        return $this->render('admin/tv_channel/new.html.twig', [
            'tvChannelForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(TvChanel $tvChanel, Request $request, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(TvChannelType::class, $tvChanel);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form->get('imageFile')->getData();
            $fileUploader->setTargetDirectory($this->getParameter('bouquets_directory'));

            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile, $tvChanel->getTitle());
                $tvChanel->setImage($imageFileName);
            }

            $this->entityManager->persist($tvChanel);
            $this->entityManager->flush();

            $this->addFlash('success', 'Modifié avec succès');

            return $this->redirectToRoute('admin_tvchannel_list');
        }

        return $this->render('admin/tv_channel/new.html.twig', [
            'tvChannelForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"POST"})
     */
    public function delete(TvChanel $tvChanel, Request $request): Response
    {
        if ($this->isCsrfTokenValid('tv-channel'.$tvChanel->getId(), $request->request->get('_csrf_token'))) {

            unlink($this->getParameter('bouquets_directory') . '/' . $tvChanel->getImage());
            $this->entityManager->remove($tvChanel);
            $this->entityManager->flush();

            $this->addFlash('success', 'Supprime avec succes');

            return $this->redirectToRoute('admin_tvchannel_list');
        }

        return $this->redirectToRoute('admin_tvchannel_list');
    }
}
