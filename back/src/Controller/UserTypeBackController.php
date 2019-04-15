<?php

namespace App\Controller;

use App\Entity\UserType;
use App\Form\UserTypeFormType;
use App\Repository\UserTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

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
    
    /**
     * @Route("/back/usertype/add", name="add_usertype_back")
     */
    public function addUserType(Request $request, UserTypeRepository $userTypeRepository, EntityManagerInterface $em)
    {
        $entity = new UserType;
               
        $form = $this->createForm(UserTypeFormType::class, $entity, []);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entity = $form->getData();

            $em->persist($entity);
            $em->flush();

            // message flash symfony
            $this->addFlash(
                'success',
                'Le type d\'utilisateur a bien été créé !'
            );
        }

        $parameters = array(
            'form' => $form->createView(),
            'entity' => $entity,
        );

        return $this->render('user_type_back/add.html.twig', $parameters);
    }
}
