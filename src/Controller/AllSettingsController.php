<?php

namespace App\Controller;

use App\Repository\CaptorSettingsRepository;
use App\Repository\GlobalSettingsRepository;
use App\Repository\ModeSurveillanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AllSettingsController extends AbstractController
{
    #[Route('/settings', name: 'app_settings')]
    public function index(GlobalSettingsRepository $globalSettingsRepository,
                          CaptorSettingsRepository $captorSettingsRepository,
                          ModeSurveillanceRepository $modeSurveillanceRepository): Response
    {
        $globalSettings = $globalSettingsRepository->findAll();

        $captorSettings = $captorSettingsRepository->findAll();

        $modesSurveillance = $modeSurveillanceRepository->findAll();

        return $this->render('settings/index.html.twig', [
            'controller_name' => 'AllSettingsController',
            'globalSettings' => $globalSettings,
            'captorSettings' => $captorSettings,
            'modesSurveillance' => $modesSurveillance
        ]);
    }
}
