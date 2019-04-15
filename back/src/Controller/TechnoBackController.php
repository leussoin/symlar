<?php

namespace App\Controller;

use App\Entity\Techno;
use App\Form\TechnoFormType;
use App\Repository\TechnoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;

class TechnoBackController extends EasyAdminController
{
    /**
     * @Route("/back/techno", name="techno_back")
     */
    public function index(TechnoRepository $technoRepository)
    {
        $technoList = $technoRepository->transformAll();

        return $this->render('techno_back/index.html.twig', [
            'technoList' => $technoList,
        ]);
    }
    
    /**
     * @Route("/back/techno/add", name="add_techno_back")
     */
    public function addTechno(Request $request, TechnoRepository $technoRepository, EntityManagerInterface $em)
    {
        $entity = new Techno;
               
        $form = $this->createForm(TechnoFormType::class, $entity, []);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entity = $form->getData();

            $em->persist($entity);
            $em->flush();

            // message flash symfony
            $this->addFlash(
                'success',
                'La compétence a bien été créée !'
            );
        }

        $parameters = array(
            'form' => $form->createView(),
            'entity' => $entity,
        );

        return $this->render('adress_back/add.html.twig', $parameters);
    }
}
