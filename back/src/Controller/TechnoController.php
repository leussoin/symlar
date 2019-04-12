<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class TechnoController extends EasyAdminController
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
