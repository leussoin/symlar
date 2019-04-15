<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class PosteController extends ApiController
{
    /**
     * @Route("/api/poste", name="poste")
     */
    public function index()
    {
        return $this->render('poste/index.html.twig', [
            'controller_name' => 'PosteController',
        ]);
    }
}
