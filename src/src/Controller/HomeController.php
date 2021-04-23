<?php

namespace App\Controller;

use App\Entity\Carro;
use App\Form\CarroType;
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
        $form = $this->createForm(CarroType::class);
        return $this->render('home/index.html.twig', [
            "carros" => $carros,
            "formCarro" => $form->createView()
        ]);
    }


    /**
     * @Route("/add", name="add")
     */
    public function add(Request $request, CarroRepository $carroRepository)
    {
        $carros = $carroRepository->findAll();
        $form = $this->createForm(CarroType::class);
        $form->handleRequest($request);
        $carro = $form->getData();

        if($form->isValid()){
            $carroRepository->save($carro);
            $this->addFlash("message", "Ok, deu certo");
            return $this->redirectToRoute("home");
        }else{
            return $this->render('home/index.html.twig', [
                "carros" => $carros,
                "formCarro" => $form->createView()
            ]);
        }
    }

    /**
     *  @Route("/editar/{id}", name="editar")
     */

    public function editar(Carro $carro): Response
    {
        $form = $this->createForm(CarroType::class, $carro);
        return $this->render('home/form.html.twig', [
            "carro"=>$carro,
            "formCarro" => $form->createView()
        ]);

    }
    /**
     * @Route("/editar/save/{id}", name="editar_save")
     */
    public function salvarEdicao(Request $request, Carro $carro,CarroRepository $carroRepository): Response
    {

        $form = $this->createForm(CarroType::class, $carro);
        $form->handleRequest($request);
        $carro = $form->getData();

        if($form->isValid()){
            $carroRepository->save($carro);
            $this->addFlash("message", "Carro editado com sucesso.");
            return $this->redirectToRoute("home");
        }else{
            return $this->render('home/form.html.twig', [
                "carro"=>$carro,
                "formCarro" => $form->createView()
            ]);
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
