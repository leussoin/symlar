<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class UserController extends ApiController
{
    /**
     * @Route("/user", name="userList")
     */
    public function list(UserRepository $userRepository)
    {
        $userList = $userRepository->transformAll();

        return $this->respond($userList) ;
    }
    
    /**
    * @Route("/user/add", methods="POST")
    */
    public function create(Request $request, UserRepository $userRepository, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);

        if (! $request) {
            return $this->respondValidationError('Please provide a valid request!');
        }

        // validate the username and someother things
        if (! $request->get('username')) {
            return $this->respondValidationError('Please provide a username!');
        }
        if (! $request->get('lastName')) {
            return $this->respondValidationError('Please provide a lastName!');
        }
        if (! $request->get('firstName')) {
            return $this->respondValidationError('Please provide a firstName!');
        }
        if (! $request->get('birthDate')) {
            return $this->respondValidationError('Please provide a birthDate!');
        }
        if (! $request->get('gender')) {
            return $this->respondValidationError('Please provide a gender!');
        }

        // persist the new user
        $user = new User;
        $user->setUsername($request->get('username'));
        $user->setUsername($request->get('lasttName'));
        $user->setUsername($request->get('firstName'));
        $user->setUsername($request->get('birthDate'));
        $user->setUsername($request->get('gender'));
        $user->setCount(0);
        $em->persist($user);
        $em->flush();

        return $this->respondCreated($userRepository->transform($user));
    }

    /**
    * @Route("/users/{id}/count", methods="POST")
    */
    public function increaseCount($id, EntityManagerInterface $em, UserRepository $userRepository)
    {
        $user = $userRepository->find($id);

        if (! $user) {
            return $this->respondNotFound();
        }

        $user->setCount($user->getCount() + 1);
        $em->persist($user);
        $em->flush();

        return $this->respond([
            'count' => $user->getCount()
        ]);
    }
}
