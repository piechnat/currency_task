<?php

namespace App\Controller;

use App\Repository\CurrencyRepository;
use App\Service\NbpApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NbpController extends AbstractController
{
    /**
     * @Route("/nbp", name="nbp_index")
     */
    public function index(NbpApiService $nbp): Response
    {
        return $this->render('nbp/index.html.twig', [
            'result' => $nbp->getExchangeRates('A'),
        ]);
    }

    /**
     * @Route("/nbp/update", name="nbp_update")
     */
    public function update(CurrencyRepository $currencyRepo, NbpApiService $nbp): Response
    {
        $currencyRepo->updateExchangeRates($nbp->getExchangeRates('A'));

        return $this->render('nbp/update.html.twig', [
            'result' => '',
        ]);
    }
}
