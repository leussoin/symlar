<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class TechnoController extends ApiController
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
