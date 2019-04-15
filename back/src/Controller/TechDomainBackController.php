<?php

namespace App\Controller;

use App\Entity\TechDomain;
use App\Form\TechDomainFormType;
use App\Repository\TechDomainRepository;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\HttpFoundation\Request;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use Symfony\Component\Routing\Annotation\Route;

class TechDomainBackController extends EasyAdminController
{
    /**
     * @Route("/back/techdomain", name="tech_domain_back")
     */
    public function index(TechDomainRepository $techDomainRepository)
    {
        $techDomainList = $techDomainRepository->transformAll();

        return $this->render('tech_domain_back/index.html.twig', [
            'techDomainList' => $techDomainList,
        ]);
    }

    /**
     * @Route("/back/techdomain/add/", name="add_techdomain_back")
     */
    public function addTechDomain(Request $request, TechDomainRepository $techDomainRepository, EntityManagerInterface $em)
    {
        $this->dispatch(EasyAdminEvents::PRE_NEW);
        
        $entity = new TechDomain;   

        $form = $this->createForm(TechDomainFormType::class, $entity, []);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entity = $form->getData();

            // dd($entity);

            $em->persist($entity);
            $em->flush();

            // message flash symfony
            $this->addFlash(
                'success',
                'Le domaine de compétence a bien été créé !'
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

        return $this->render('tech_domain_back/add.html.twig', $parameters);
    }
}
