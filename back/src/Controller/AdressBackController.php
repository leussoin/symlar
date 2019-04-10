<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AdressBackController extends AbstractController
{
    /**
     * @Route("/back/adress", name="adress_back")
     */
    public function index()
    {
        return $this->render('adress_back/index.html.twig', [
            'controller_name' => 'AdressBackController',
        ]);
    }
}
