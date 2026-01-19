<?php

namespace App\Controller;

use App\Repository\VoitureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class IndexController extends AbstractController
{
    #[Route('/', name: 'app_index')]
    public function index(VoitureRepository $repository): Response
    {
        $voitures = $repository->findAll();
        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
            'voitures' => $voitures
        ]);
    }
}
