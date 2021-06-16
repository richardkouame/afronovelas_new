<?php


namespace App\Controller\Admin;


use App\Entity\Program;
use App\Form\ProgramType;
use App\Repository\ProgramRepository;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/programmes", name="admin_program_")
 */
class ProgramController extends AbstractController
{
    /**
     * @Route("/", name="liste")
     * @return Response
     */
    public function index(ProgramRepository $programRepository): Response
    {
        return $this->render('admin/programme/index.html.twig', [
            'programmes' => $programRepository->findAll()
        ]);
    }

    /**
     * @Route("/add", name="new")
     * @return Response
     */
    public function new(Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader): Response
    {
        $program = new Program();
        $form = $this->createForm(ProgramType::class, $program);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile, $program->getTitle());
                $program->setImage($imageFileName);
            }

            $program
                ->setUser($this->getUser());

            $entityManager->persist($program);
            $entityManager->flush();

            return $this->redirectToRoute('admin_program_liste');
        }

        return $this->render('admin/programme/new.html.twig', [
            'programForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Program $program, Request $request, EntityManagerInterface $entityManager, FileUploader $fileUploader): Response
    {
        $form = $this->createForm(ProgramType::class, $program);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('imageFile')->getData();
            if ($imageFile) {
                $imageFileName = $fileUploader->upload($imageFile, $program->getTitle());
                $program->setImage($imageFileName);
            }

            $entityManager->persist($program);
            $entityManager->flush();

            return $this->redirectToRoute('admin_program_liste');
        }

        return $this->render('admin/programme/new.html.twig', [
            'programForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete", methods={"POST"})
     */
    public function delete(Program $program, Request $request, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('program'.$program->getId(), $request->request->get('_csrf_token'))) {
            $entityManager->remove($program);
            $entityManager->flush();

            $this->addFlash('success', 'Supprime avec succes');

            return $this->redirectToRoute('admin_program_liste');
        }

        return $this->redirectToRoute('admin_program_liste');
    }
}