<?php

namespace App\Controller;

use App\Entity\Snacks;
use App\Form\SnacksType;
use App\Repository\SnacksRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/snacks')]
class SnacksController extends AbstractController
{
    // #[Route('/', name: 'app_snacks_index', methods: ['GET'])]
    // public function index(SnacksRepository $snacksRepository): Response
    // {
    //     return $this->render('snacks/index.html.twig', [
    //         'snacks' => $snacksRepository->findAll(),
    //     ]);
    // }

    // #[Route('/new', name: 'app_snacks_new', methods: ['GET', 'POST'])]
    // public function new(Request $request, EntityManagerInterface $entityManager): Response
    // {
    //     $snack = new Snacks();
    //     $form = $this->createForm(SnacksType::class, $snack);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($snack);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_snacks_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('snacks/new.html.twig', [
    //         'snack' => $snack,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/get-snack-names/{type}', name: 'app_get_snack_names', methods: ['GET'])]
    // public function getSnackNames(string $type, SnacksRepository $snacksRepository): JsonResponse
    // {
    //     $snackNames = $snacksRepository->findNamesByType($type); // Implement this method in your repository
    //     return $this->json($snackNames);
    // }

    // #[Route('/{id}', name: 'app_snacks_show', methods: ['GET'])]
    // public function show(Snacks $snack): Response
    // {
    //     return $this->render('snacks/show.html.twig', [
    //         'snack' => $snack,
    //     ]);
    // }

    // #[Route('/{id}/edit', name: 'app_snacks_edit', methods: ['GET', 'POST'])]
    // public function edit(Request $request, Snacks $snack, EntityManagerInterface $entityManager): Response
    // {
    //     $form = $this->createForm(SnacksType::class, $snack);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->flush();

    //         return $this->redirectToRoute('app_snacks_index', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('snacks/edit.html.twig', [
    //         'snack' => $snack,
    //         'form' => $form,
    //     ]);
    // }

    // #[Route('/{id}', name: 'app_snacks_delete', methods: ['POST'])]
    // public function delete(Request $request, Snacks $snack, EntityManagerInterface $entityManager): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$snack->getId(), $request->getPayload()->get('_token'))) {
    //         $entityManager->remove($snack);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('app_snacks_index', [], Response::HTTP_SEE_OTHER);
    // }
}
