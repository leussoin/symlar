<?php

namespace App\Controller;

use App\Repository\PosteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PosteBackController extends AbstractController
{
    /**
     * @Route("/back/poste", name="poste_back")
     */
    public function index(PosteRepository $posteRepository)
    {
        $posteList = $posteRepository->transformAll();
     
        return $this->render('poste_back/index.html.twig', [
            'posteList' => $posteList,
        ]);
    }
}
