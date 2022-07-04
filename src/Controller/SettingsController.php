<?php

namespace App\Controller;

use App\Form\GlobalSettingsType;
use App\Repository\GlobalSettingsRepository;
use App\Repository\SensorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    #[Route('/settings', name: 'app_settings')]
    public function index(GlobalSettingsRepository $globalSettingsRepository,
                          SensorRepository $sensorRepository): Response
    {
        $globalSettings = $globalSettingsRepository->findAll();
        $sensors = $sensorRepository->findAll();
        $form = $this->createForm(GlobalSettingsType::class);
        $global_settings_form = $form->createView();
        return $this->render('settings/index.html.twig', [
            'global_settings' => $globalSettings,
            'global_settings_form' => $global_settings_form,
            'sensors' => $sensors
        ]);
    }
}
