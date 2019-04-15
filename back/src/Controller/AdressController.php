<?php

namespace App\Controller;

use App\Repository\AdressRepository;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdressController extends ApiController
{
    /**
     * @Route("/api/adress", name="adress")
     */
    public function index(AdressRepository $adressRepository)
    {
        $adressList = $adressRepository->transformAll();

        return $this->respond($adressList) ;
    }

    
    /**
     * @Route("/api/adress/get", name="adress")
     */
    public function getSpecificAdress(Request $request, AdressRepository $adressRepository, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);

        $data = [   
            "cp" => $request->get("cp"),
            "adress" => $request->get("adress"),
            "city" => $request->get("city")
        ];

        $adressList = $adressRepository->getSpecific($em, $data);

        // dd($adressList);

        return $this->respond($adressList) ;
    }

    
}
