<?php

namespace App\Controller;

use App\Service\NbpApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NbpController extends AbstractController
{
    /**
     * @Route("/nbp", name="nbp")
     */
    public function index(NbpApiService $nbp): Response
    {
        return $this->render('nbp/index.html.twig', [
            'result' => $nbp->getExchangeRates('A'),
        ]);
    }
}
