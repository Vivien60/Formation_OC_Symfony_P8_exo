<?php

namespace App\Controller;

use App\Entity\Voiture;
use App\Form\VoitureType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/voiture')]
final class VoitureController extends AbstractController
{
    #[Route('/new', name: 'app_voiture_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $manager): Response
    {
        $voiture = new Voiture();
        $form = $this->createForm(VoitureType::class, $voiture);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($voiture);
            $manager->flush();

            return $this->redirectToRoute('app_index');
        }
        return $this->render('voiture/new.html.twig', [
            'controller_name' => 'VoitureController',
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_voiture_show', requirements: ['id' => '\d+'], methods: ['GET'])]
    public function show(?Voiture $voiture): Response
    {
        return $this->render('voiture/show.html.twig', [
            'controller_name' => 'VoitureController',
            'voiture' => $voiture,
        ]);
    }
}
