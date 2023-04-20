<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvailableController extends AbstractController
{
    #[Route('/available', name: 'app_available')]
    public function index(): Response
    {
        return $this->render('available/index.html.twig', [
            'controller_name' => 'AvailableController',
        ]);
    }
}
