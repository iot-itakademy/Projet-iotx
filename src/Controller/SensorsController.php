<?php

namespace App\Controller;

use App\Entity\Sensors;
use App\Form\SensorsType;
use App\Repository\SensorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SensorsController extends AbstractController
{
    /**
     * @Route("/settings/sensors", name="app_sensors_list")
     */
    public function list(SensorRepository $sensorRepository)
    {
        $sensors = $sensorRepository->findAll();

        return $this->render('settings/_sensors.html.twig', [
            'sensors' => $sensors,
        ]);
    }

    /**
     * @Route("/settings/sensors/edit/{id}", name="app_sensors_edit")
     */
    public function edit(Sensors $sensors)
    {
        $form = $this->createForm(SensorsType::class, $sensors);

        $sensors_form = $form->createView();

        return $this->render('sensors/_form.html.twig', [
            'sensors_form' => $sensors_form
        ]);
    }
}
