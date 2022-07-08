<?php

namespace App\Controller;

use DateTime;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route('/gallery', name: 'app_gallery_')]
#[IsGranted('ROLE_GRANTED')]
class GalleryController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(HttpClientInterface $client): Response
    {
        $tabYear = [];
        $images = $client->request("GET", "http://www.scrutoscope.live/api/file/images/name");
        foreach (json_decode($images->getContent()) as $image)
        {
            $substringDate = strstr($image, '_', true);
            $date = DateTime::createFromFormat("Y-m-d-H-i-s-v", $substringDate);
            if (!in_array($date->format("Y"), $tabYear)) {
                $tabYear[] = $date->format("Y");
                asort($tabYear);
            }
        }
        return $this->render('gallery/index.html.twig', [
            'tabYear' => $tabYear
        ]);
    }

    #[Route('/{year}/{month}', name: "byDate")]
    public function photoByDate(Request $request, HttpClientInterface $client, string $year, string $month)
    {
        $imagesTemp = $client->request("GET", "http://www.scrutoscope.live/api/file/images/" . $year . "/" . $month);
        $images = json_decode($imagesTemp->getContent());

        if (empty($images))
            return new JsonResponse([
                'data' => "Aucune images trouvées"
            ], 404);

        foreach ($images as $image) {
            $subStringDate = strstr($image->fileName, "_", true);
            $date = DateTime::createFromFormat("Y-m-d-H-i-s-v", $subStringDate);
            $image->date = $date->format('H:i:s d-m-Y');
        }
        $html = $this->render('gallery/carousel.html.twig', [
            'images' => $images
        ])->getContent();

        return new JsonResponse([
            "data" => $html
        ], 200);
    }
}
