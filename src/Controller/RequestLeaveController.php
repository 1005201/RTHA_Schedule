<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RequestLeaveController extends AbstractController
{
    #[Route('/request/leave', name: 'app_request_leave')]
    public function index(): Response
    {
        return $this->render('request_leave/index.html.twig', [
            'controller_name' => 'RequestLeaveController',
        ]);
    }
}
