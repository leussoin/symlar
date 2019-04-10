<?php

namespace App\Controller;

use App\Repository\TechDomainRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TechDomainBackController extends AbstractController
{
    /**
     * @Route("/back/techdomain", name="tech_domain_back")
     */
    public function index(TechDomainRepository $techDomainRepository)
    {
        $techDomainList = $techDomainRepository->transformAll();

        return $this->render('tech_domain_back/index.html.twig', [
            'techDomainList' => $techDomainList,
        ]);
    }
}
