<?php

namespace App\Controller;

use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class UserTypeBackController extends EasyAdminController
{
    /**
     * @Route("/back/usertype", name="user_type_back")
     */
    public function index()
    {
        return $this->render('user_type_back/index.html.twig', [
            'controller_name' => 'UserTypeBackController',
        ]);
    }
}
