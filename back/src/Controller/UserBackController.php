<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserBackController extends AbstractController
{
    /**
     * @Route("/back/user", name="user_back")
     */
    public function index()
    {
        return $this->render('user_back/index.html.twig', [
            'controller_name' => 'UserBackController',
        ]);
    }
}
