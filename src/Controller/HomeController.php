<?php

namespace App\Controller;

use stdClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\UX\Chartjs\Builder\ChartBuilderInterface;
use Symfony\UX\Chartjs\Model\Chart;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    private HttpClientInterface $client;

    #[Route('/', name: 'home.index')]
    public function index(ChartBuilderInterface $chartBuilder): Response
    {
        $chart1 = $chartBuilder->createChart(Chart::TYPE_LINE);
        $chart1->setData([
            'labels' => ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'],
            'datasets' => [
                [
                    'label' => 'Activité de la semaine',
                    'backgroundColor' => 'rgb(255, 99, 132)',
                    'borderColor' => 'rgb(255, 99, 132)',
                    'data' => [1, 2 , 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31]
                ],
            ],
        ]);

        $chart2 = $chartBuilder->createChart(Chart::TYPE_DOUGHNUT);
        $chart2->setData([
            'labels' => ['Intrus', 'Amis', 'Erreur'],
            'datasets' => [
                [
                    'label' => 'Activité de la semaine',
                    'data'=> [300, 50, 100],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)'
                    ],

                ]
            ]
        ]);
        $params = $this->getCameraParams();
        $params = $params[0];
        $json = json_decode(json_encode($params), true);
        $json = json_decode($json['params'], true);
        //dd($json);

        return $this->render('home.html.twig', [
            'chart1' => $chart1,
            'chart2' => $chart2,
            'cameraInfo' => $params,
            'cameraParam' => $json
        ]);

    }

    public function __construct(HttpClientInterface $client){
        $this->client = $client;
    }

    public function getCameraParams(): array{
        $response = $this->client->request(
            'GET',
            'http://www.scrutoscope.live/api/settings/camera/1'
        );
        return json_decode($response->getContent());
    }

}
