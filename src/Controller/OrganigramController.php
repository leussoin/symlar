<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController;

class OrganigramController extends ApiController
{
    /**
     * @Route("/organigram", name="organigram")
     */
    public function index()
    {
        return $this->render('organigram/index.html.twig', [
            'controller_name' => 'OrganigramController',
        ]);
    }
}
