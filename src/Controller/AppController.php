<?php

namespace App\Controller;

use App\Repository\FooterBannerRepository;
use App\Repository\ProgramRepository;
use App\Repository\ScheduleRepository;
use App\Repository\SerieRepository;
use App\Repository\SloganRepository;
use App\Repository\SocialRepository;
use App\Repository\TvChanelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="homepage", requirements={"_locale": "en|fr"})
     */
    public function index(Request $request, ProgramRepository $programRepository, SerieRepository $serieRepository, ScheduleRepository $scheduleRepository, TvChanelRepository $tvChanelRepository, SocialRepository $socialRepository, SloganRepository $sloganRepository, FooterBannerRepository $footerBannerRepository): Response
    {
        $slogan = $sloganRepository->findAll();
        $footerBanner = $footerBannerRepository->findAll();

        $schedules = $scheduleRepository->findAll();

        $grouped_schedules = array();

        foreach($schedules as $schedule){
            $grouped_schedules[$schedule->getBloc()][] = $schedule;
        }

        return $this->render('front/index.html.twig', [
            'controller_name' => 'AppController',
            'banner_data' => $programRepository->findAll(),
            'bouquets' => $tvChanelRepository->findAll(),
            'novelas' => $serieRepository->findAll(),
            'tvguide' => $grouped_schedules,
            'slogan' => $slogan[0],
            'footerBanner' => $footerBanner[0],
            'facebook' => $socialRepository->findOneBy(['title' => 'facebook']),
            'youtube' => $socialRepository->findOneBy(['title' => 'youtube']),
            'instagram' => $socialRepository->findOneBy(['title' => 'instagram']),
            'tiktok' => $socialRepository->findOneBy(['title' => 'tiktok']),
        ]);
    }

    /**
     * @Route("/conditions-generales-de-vente", name="front_cgv")
     */
    public function cgv(): Response
    {
        return $this->render('front/cgv.html.twig');
    }

    /**
     * @Route("/conditions-generales-d-utilisation", name="front_cgu")
     */
    public function cgu(): Response
    {
        return $this->render('front/cgu.html.twig');
    }

    /**
     * @Route("/nos-contacts", name="front_contacts")
     */
    public function noscontacts(): Response
    {
        return $this->render("front/contact.html.twig");
    }

    /**
     * @Route("/politiques-de-confidentialite", name="front_pdc")
     */
    public function pdc(): Response
    {
        return $this->render("front/politiques-de-confidentialite.html.twig");
    }

    /**
     * @Route("/switch-lang/{_locale}", name="switch_lang")
     */
    public function switch_lang($_locale, Request $request): Response
    {
        //$_locale = $request->getLocale();

        $cookie = new Cookie("_locale",$_locale);

        $e = explode("/", $request->server->get("HTTP_REFERER"));
        if(in_array($e[3], ["en","fr"])){
            array_splice($e, 3,1,$_locale);
        }
        else{
            array_splice($e, 3,0,$_locale);
        }

        $url = implode("/", $e);
        header("Location: $url");
        exit();
    }
}
