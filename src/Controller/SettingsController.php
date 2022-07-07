<?php

namespace App\Controller;

use App\Form\SensorsType;
use App\Form\GlobalSettingsType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    #[Route('/settings', name: 'app_settings')]
    public function index(): Response
    {
        $form1 = $this->createForm(GlobalSettingsType::class);
        $global_settings_form = $form1->createView();

        $form2 = $this->createForm(SensorsType::class);
        $sensors_form = $form2->createView();

        return $this->render('settings/index.html.twig', [
            'global_settings_form' => $global_settings_form,
            'sensors_form' => $sensors_form
        ]);
    }
}
