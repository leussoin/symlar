<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TechDomainController extends AbstractController
{
    /**
     * @Route("/tech/domain", name="tech_domain")
     */
    public function index()
    {
        return $this->render('tech_domain/index.html.twig', [
            'controller_name' => 'TechDomainController',
        ]);
    }
}
