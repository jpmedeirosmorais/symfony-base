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
        if($marca == "" || $modelo == "" || $preco == "")
        {
            $this->addFlash("message", "Pro favor não deixe nenhum campo vazio.");
            return $this->redirectToRoute("home");
        }else {
            $carro = new Carro($marca, $modelo, $preco);
            $carroRepository->save($carro);

            $this->addFlash("message", "Ok, deu certo");
            return $this->redirectToRoute("home");
        }
    }

    /**
     *  @Route("/editar/{id}", name="editar")
     */

    public function editar(Carro $carro): Response
    {
        return $this->render('home/form.html.twig', [
            "carro"=>$carro
        ]);
    }
    /**
     * @Route("/editar/save/{id}", name="editar_save")
     */
    public function salvarEdicao(Request $request, Carro $carro,CarroRepository $carroRepository): Response
    {
        $marca=$request->get('marca');
        $modelo=$request->get('modelo');
        $preco=$request->get('preco');


        if($marca == "" || $modelo == "" || $preco == "")
        {
            $this->addFlash("message", "Pro favor não deixe nenhum campo vazio.");
            return $this->redirectToRoute("home");
        }else
        {
            $carro->setMarca($marca);
            $carro->setModelo($modelo);
            $carro->setPreco($preco);

            $this->addFlash("message", "Carro editado com sucesso.");
            return $this->redirectToRoute("home");
        }

    }

    /**
     * @Route("/remove/{id}", name="remover")
     */
    public function remover(Carro $carro, CarroRepository $carroRepository): Response
    {
        $carroRepository->remove($carro);
        $this->addFlash("message","Carro excluido com sucesso!");

        return $this->redirectToRoute("home");
    }
}
