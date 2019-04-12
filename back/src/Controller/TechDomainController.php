<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class TechDomainController extends EasyAdminController
{
    /**
     * @Route("/api/techdomain", name="tech_domain")
     */
    public function index()
    {
        return $this->render('tech_domain/index.html.twig', [
            'controller_name' => 'TechDomainController',
        ]);
    }
}
