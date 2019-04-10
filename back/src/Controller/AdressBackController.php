<?php

namespace App\Controller;

use App\Repository\AdressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdressBackController extends AbstractController
{
    /**
     * @Route("/back/adress", name="adress_back")
     */
    public function index(AdressRepository $adressRepository)
    {
        $adressList = $adressRepository->transformAll();

        return $this->render('adress_back/index.html.twig', [
            'adressList' => $adressList,
        ]);
    }
}
