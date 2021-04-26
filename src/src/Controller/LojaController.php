<?php

namespace App\Controller;

use App\Entity\Loja;
use App\Form\LojaType;
use App\Repository\LojaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/loja')]
class LojaController extends AbstractController
{
    #[Route('/', name: 'loja_index', methods: ['GET'])]
    public function index(LojaRepository $lojaRepository): Response
    {
        return $this->render('loja/index.html.twig', [
            'lojas' => $lojaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'loja_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $loja = new Loja();
        $form = $this->createForm(LojaType::class, $loja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($loja);
            $entityManager->flush();

            return $this->redirectToRoute('loja_index');
        }

        return $this->render('loja/new.html.twig', [
            'loja' => $loja,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'loja_show', methods: ['GET'])]
    public function show(Loja $loja): Response
    {
        return $this->render('loja/show.html.twig', [
            'loja' => $loja,
        ]);
    }

    #[Route('/{id}/edit', name: 'loja_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Loja $loja): Response
    {
        $form = $this->createForm(LojaType::class, $loja);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('loja_index');
        }

        return $this->render('loja/edit.html.twig', [
            'loja' => $loja,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'loja_delete', methods: ['POST'])]
    public function delete(Request $request, Loja $loja): Response
    {
        if ($this->isCsrfTokenValid('delete'.$loja->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($loja);
            $entityManager->flush();
        }

        return $this->redirectToRoute('loja_index');
    }
}
