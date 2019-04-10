<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TechDomainBackController extends AbstractController
{
    /**
     * @Route("/back/techdomain", name="tech_domain_back")
     */
    public function index()
    {
        return $this->render('tech_domain_back/index.html.twig', [
            'controller_name' => 'TechDomainBackController',
        ]);
    }
}
