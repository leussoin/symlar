<?php

namespace App\Controller;

use App\Repository\AdressRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdressController extends AbstractController
{
    /**
     * @Route("/adress", name="adress")
     */
    public function index(AdressRepository $adressRepository)
    {
        $adressList = $adressRepository->transformAll();

        return $this->respond($adressList) ;
    }
}
