<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserTypeBackController extends AbstractController
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
