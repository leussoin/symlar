<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PosteBackController extends AbstractController
{
    /**
     * @Route("/back/poste", name="poste_back")
     */
    public function index()
    {
        return $this->render('poste_back/index.html.twig', [
            'controller_name' => 'PosteBackController',
        ]);
    }
}
