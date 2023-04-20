<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ForgettenPasswordController extends AbstractController
{
    #[Route('/forgetten/password', name: 'app_forgetten_password')]
    public function index(): Response
    {
        return $this->render('forgetten_password/index.html.twig', [
            'controller_name' => 'ForgettenPasswordController',
        ]);
    }
}
