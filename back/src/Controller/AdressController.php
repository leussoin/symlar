<?php

namespace App\Controller;

use App\Repository\AdressRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class AdressController extends EasyAdminController
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
