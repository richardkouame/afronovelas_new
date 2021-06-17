<?php

namespace App\Controller\Admin;

use App\Entity\Schedule;
use App\Form\ScheduleType;
use App\Repository\ScheduleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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

        $grouped_types = array();

        foreach($schedules as $schedule){
            $grouped_types[$schedule->getBloc()][] = $schedule;
        }

        return $this->render('admin/schedule/index.html.twig', [
            'schedules' => $grouped_types
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

            $timeGroup = $request->get('outer-group')[0]['inner-group'];
            $title = $request->get('outer-group')[0]['title'];

            foreach ($timeGroup as $time) {
                $status = false;
                if (isset($time['status']) && $time['status'][0] == '1') {
                    $status = true;
                }

                $data = (new Schedule())
                    ->setTitle($title)
                    ->setPassage($time['passageTab'])
                    ->setBloc($time['bloc'])
                    ->setStatus($status)
                    ->setUser($this->getUser());

                $this->manager->persist($data);
            }

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
        //$schedule->getStatus() ? $bool = 'true' : $bool = 'false';
        //$form = $this->createForm(ScheduleType::class, $schedule);
        $form = $this->createFormBuilder($schedule)
            ->add('title', TextType::class, [
                'required' => false,
                'label' => 'Titre du programme',
                'attr' => [
                    'value' => $schedule->getTitle()
                ]
            ])->getForm();
        //$request->request->set('title', 'Bro');
        //$form->getData()->setTitle($request->get('outer-group')[0]['title']);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            if (!isset($request->get('outer-group')[0]['status'][0]) || $request->get('outer-group')[0]['status'][0] == null) {
                $status = false;
            } else {
                $status = $request->get('outer-group')[0]['status'][0];
            }

            $timeGroup = $request->get('outer-group')[0]['inner-group'];
            $title = $request->get('outer-group')[0]['title'];

            foreach ($timeGroup as $time) {
                $t[] = $time['passageTab'];
            }

            $schedule
                ->setTitle($title)
                ->setPassage($t)
                ->setStatus($status == '1' ? true : false);

            $this->manager->persist($schedule);
            $this->manager->flush();

            $this->addFlash('success', 'Modifié avec succès');

            return $this->redirectToRoute('admin_schedule_list');
        }

        return $this->render('admin/schedule/edit.html.twig', [
            'title' => $schedule->getTitle(),
            'status' => $schedule->getStatus(),
            'passages' => $schedule->getPassage(),
            'scheduleForm' => $form->createView()
        ]);
    }
}
