<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;

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

        dump($_POST);
        dd($request);

        // persist the new user
        $user = new User;
        $user->setUsername($request->get('username'));
        $user->setUsername($request->get('lasttName'));
        $user->setUsername($request->get('firstName'));
        $user->setUsername($request->get('birthDate'));
        $user->setUsername($request->get('gender'));
        
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
