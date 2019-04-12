<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class UserTypeController extends EasyAdminController
{
    /**
     * @Route("/api/usertype", name="user_type")
     */
    public function index()
    {
        return $this->render('user_type/index.html.twig', [
            'controller_name' => 'UserTypeController',
        ]);
    }
}
