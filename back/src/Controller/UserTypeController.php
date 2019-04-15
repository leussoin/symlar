<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;

class UserTypeController extends ApiController
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
