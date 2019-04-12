<?php

namespace App\Controller;

use App\Entity\Adress;
use App\Form\AdressFormType;
use App\Repository\AdressRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\EasyAdminController;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class AdressBackController extends EasyAdminController
{
    /**
     * @Route("/back/adress", name="adress_back")
     */
    public function index(AdressRepository $adressRepository)
    {
        $adressList = $adressRepository->transformAll();

        return $this->render('adress_back/index.html.twig', [
            'adressList' => $adressList,
        ]);
    }

    /**
     * @Route("/back/adress/add", name="add_adress_back")
     */
    public function addAdress(Request $request, AdressRepository $adressRepository, EntityManagerInterface $em)
    {
        $entity = new Adress;
               
        $form = $this->createForm(AdressFormType::class, $entity, []);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $entity = $form->getData();

            $em->persist($entity);
            $em->flush();

            // message flash symfony
            $this->addFlash(
                'success',
                'L\'adresse a bien été créée !'
            );
        }

        $parameters = array(
            'form' => $form->createView(),
            'entity' => $entity,
        );

        return $this->render('adress_back/add.html.twig', $parameters);
    }
}
