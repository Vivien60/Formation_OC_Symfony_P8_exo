<?php

namespace App\Controller;

use App\Entity\Voiture;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VoitureController extends AbstractController
{
    #[Route('/voiture', name: 'app_voiture')]
    public function index(): Response
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }

    #[Route('/voiture', name: 'app_voiture')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        return $this->render('voiture/index.html.twig', [
            'controller_name' => 'VoitureController',
        ]);
    }
}
