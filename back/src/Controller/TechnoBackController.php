<?php

namespace App\Controller;

use App\Repository\TechnoRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class TechnoBackController extends EasyAdminController
{
    /**
     * @Route("/back/techno", name="techno_back")
     */
    public function index(TechnoRepository $technoRepository)
    {
        $technoList = $technoRepository->transformAll();
 
        return $this->render('techno_back/index.html.twig', [
            'technoList' => $technoList,
        ]);
    }
}
