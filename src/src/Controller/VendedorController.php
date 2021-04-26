<?php

namespace App\Controller;

use App\Entity\Vendedor;
use App\Form\VendedorType;
use App\Repository\VendedorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/vendedor')]
class VendedorController extends AbstractController
{
    #[Route('/', name: 'vendedor_index', methods: ['GET'])]
    public function index(VendedorRepository $vendedorRepository): Response
    {
        return $this->render('vendedor/index.html.twig', [
            'vendedors' => $vendedorRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'vendedor_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $vendedor = new Vendedor();
        $form = $this->createForm(VendedorType::class, $vendedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($vendedor);
            $entityManager->flush();

            return $this->redirectToRoute('vendedor_index');
        }

        return $this->render('vendedor/new.html.twig', [
            'vendedor' => $vendedor,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'vendedor_show', methods: ['GET'])]
    public function show(Vendedor $vendedor): Response
    {
        return $this->render('vendedor/show.html.twig', [
            'vendedor' => $vendedor,
        ]);
    }

    #[Route('/{id}/edit', name: 'vendedor_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Vendedor $vendedor): Response
    {
        $form = $this->createForm(VendedorType::class, $vendedor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('vendedor_index');
        }

        return $this->render('vendedor/edit.html.twig', [
            'vendedor' => $vendedor,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'vendedor_delete', methods: ['POST'])]
    public function delete(Request $request, Vendedor $vendedor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$vendedor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($vendedor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('vendedor_index');
    }
}
