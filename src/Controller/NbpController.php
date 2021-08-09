<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NbpController extends AbstractController
{
    /**
     * @Route("/nbp", name="nbp")
     */
    public function index(): Response
    {
        return $this->render('nbp/index.html.twig', [
            'controller_name' => 'NbpController',
        ]);
    }
}
