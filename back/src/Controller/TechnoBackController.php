<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TechnoBackController extends AbstractController
{
    /**
     * @Route("/back/techno", name="techno_back")
     */
    public function index()
    {
        return $this->render('techno_back/index.html.twig', [
            'controller_name' => 'TechnoBackController',
        ]);
    }
}
