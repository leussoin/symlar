<?php

namespace App\Controller;

use App\Form\UserFormType;
use App\Entity\User;
use App\Repository\UserRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class UserBackController extends EasyAdminController
{
    /**
     * @Route("/back/user", name="user_back")
     */
    public function index(UserRepository $userRepository)
    {

        $userList = $userRepository->fullTransformAll();

        // dd($userList);

        return $this->render('user_back/index.html.twig', [
            'userList' => $userList,
        ]);
    }

    /**
     * @Route("/back/user/add/", name="add_user_back")
     */
    public function addUser(Request $request, UserRepository $userRepository, EntityManagerInterface $em)
    {
        $this->dispatch(EasyAdminEvents::PRE_NEW);
        
        $entity = new User;   

        $form = $this->createForm(UserFormType::class, $entity, []);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entity = $form->getData();
            $entity->setRoles(['a:1:{i:0;s:9:"ROLE_USER";}']);

            // dd($entity);

            $em->persist($entity);
            $em->flush();

            // message flash symfony
            $this->addFlash(
                'success',
                'L\'utilisateur a bien été créé !'
            );

        }

        $this->dispatch(EasyAdminEvents::POST_NEW, array(
            'form' => $form,
            'entity' => $entity,
        ));

        $parameters = array(
            'form' => $form->createView(),
            'entity' => $entity,
        );

        return $this->render('user_back/add.html.twig', $parameters);
    }
}
