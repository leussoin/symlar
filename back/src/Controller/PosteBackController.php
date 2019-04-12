<?php

namespace App\Controller;

use App\Form\PosteFormType;
use App\Entity\Poste;
use App\Repository\PosteRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class PosteBackController extends EasyAdminController
{
    /**
     * @Route("/back/poste", name="poste_back")
     */
    public function index(PosteRepository $posteRepository)
    {
        $posteList = $posteRepository->transformAll();
     
        return $this->render('poste_back/index.html.twig', [
            'posteList' => $posteList,
        ]);
    }

    /**
     * @Route("/back/poste/add/", name="add_poste_back")
     */
    public function addPoste(Request $request, PosteRepository $posteRepository, EntityManagerInterface $em)
    {
        $this->dispatch(EasyAdminEvents::PRE_NEW);
        
        $entity = new Poste;   

        $form = $this->createForm(PosteFormType::class, $entity, []);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entity = $form->getData();

            // dd($entity);

            $em->persist($entity);
            $em->flush();

            // message flash symfony
            $this->addFlash(
                'success',
                'Le poste a bien été créé !'
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

        return $this->render('poste_back/add.html.twig', $parameters);
    }
}
