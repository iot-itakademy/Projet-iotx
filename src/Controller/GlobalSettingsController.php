<?php

namespace App\Controller;

use App\Form\GlobalSettingsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GlobalSettingsController extends AbstractController
{
    #[Route('/settings/globalSettings', name: 'app_global_settings')]
    public function edit(EntityManagerInterface $em)
    {
        $form = $this->createForm(GlobalSettingsType::class);
        return $this->render('global_settings/_form.html.twig', [
            'global_settings_form' => $form->createView()
        ]);
    }
}
