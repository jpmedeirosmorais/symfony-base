<?php

namespace App\Controller;

use App\Entity\Carro;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $gol = new Carro("VolwksWagem", "Gol", 48000);
        $uno = new Carro("Fiat", "Uno", 56000);
        $carros = [$gol, $uno];

        return $this->render('home/index.html.twig', [
            "carros" => $carros
        ]);
    }
}
