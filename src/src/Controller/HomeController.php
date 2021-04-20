<?php

namespace App\Controller;

use App\Entity\Carro;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CarroRepository;



class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(CarroRepository $carroRepository): Response
    {
        
        $carros = $carroRepository->findAll();

        return $this->render('home/index.html.twig', [
            "carros" => $carros
        ]);
    }


    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request, CarroRepository $carroRepository)
    {
        $marca = $request->get('marca');
        $modelo = $request->get('modelo');
        $preco = $request->get('preco');

        $carro = new Carro($marca, $modelo, $preco);
        $carroRepository->save($carro);

        $this->addFlash("message", "Ok, deu certo");
        return $this->redirectToRoute("home");
    }
}
