<?php

namespace App\Controller;

use App\Entity\GlobalSettings;
use App\Form\GlobalSettingsType;
use App\Repository\GlobalSettingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class GlobalSettingsController extends AbstractController
{
    /**
     * @Route("/settings/globalSettings", name="app_global_settings_list")
     */
    public function list(GlobalSettingsRepository $globalSettingsRepository)
    {
        $globalSettings = $globalSettingsRepository->findAll();

        return $this->render('settings/_globalSettings.html.twig', [
            'globalSettings' => $globalSettings,
        ]);
    }

    /**
     * @Route("/settings/globalSettings/edit/{id}", name="app_global_settings_edit")
     */
    public function edit(GlobalSettings $globalSettings, Request $request, EntityManagerInterface $em)
    {
        $form = $this->createForm(GlobalSettingsType::class, $globalSettings);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($globalSettings);
            $em->flush();
            $this->addFlash('success', 'Mise à jour réussie !');
            return $this->redirectToRoute('app_settings');
        }

        $globalSettings_form = $form->createView();

        return $this->render('global_settings/_form.html.twig', [
            'global_settings_form' => $globalSettings_form
        ]);
    }
}
