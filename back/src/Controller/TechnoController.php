<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TechnoController extends AbstractController
{
    /**
     * @Route("/api/techno", name="techno")
     */
    public function index()
    {
        return $this->render('techno/index.html.twig', [
            'controller_name' => 'TechnoController',
        ]);
    }
}
