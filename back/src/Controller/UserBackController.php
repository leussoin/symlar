<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserBackController extends AbstractController
{
    /**
     * @Route("/back/user", name="user_back")
     */
    public function index(UserRepository $userRepository)
    {

        dd($userRepository->findById(14));

        $userList = $userRepository->fullTransformAll();

        return $this->render('user_back/index.html.twig', [
            'userList' => $userList,
        ]);
    }
}
