<?php

namespace App\Controller;

use App\Form\SensorsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SensorsController extends AbstractController
{
    #[Route('/settings/sensors', name: 'app_sensors')]
    public function edit(EntityManagerInterface $em)
    {
        $form = $this->createForm(SensorsType::class);
        return $this->render('sensors/_form.html.twig', [
            'sensors_form' => $form->createView()
        ]);
    }
}
