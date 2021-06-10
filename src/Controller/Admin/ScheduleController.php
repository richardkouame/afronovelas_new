<?php

namespace App\Controller\Admin;

use App\Entity\Schedule;
use App\Form\ScheduleType;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/schedule", name="admin_schedule_")
 */
class ScheduleController extends AbstractController
{

    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }
    /**
     * @Route("/", name="list")
     */
    public function index(ScheduleRepository $scheduleRepository): Response
    {
        $schedules = $scheduleRepository->findAll();
        return $this->render('admin/schedule/index.html.twig', [
            'schedules' => $schedules
        ]);
    }

    /**
     * @Route("/new", name="new")
     */
    public function new(Request $request): Response
    {
        $schedule = new Schedule();
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $schedule->setUser($this->getUser());

            $this->manager->persist($schedule);
            $this->manager->flush();

            $this->addFlash('success', 'Ajouté avec succès');

            return $this->redirectToRoute('admin_schedule_list');
        }

        return $this->render('admin/schedule/new.html.twig', [
            'scheduleForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/edit/{id}", name="edit")
     */
    public function edit(Schedule $schedule, Request $request): Response
    {
        $form = $this->createForm(ScheduleType::class, $schedule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->manager->persist($schedule);
            $this->manager->flush();

            $this->addFlash('success', 'Modifié avec succès');

            return $this->redirectToRoute('admin_schedule_list');
        }

        return $this->render('admin/schedule/new.html.twig', [
            'scheduleForm' => $form->createView()
        ]);
    }
}
