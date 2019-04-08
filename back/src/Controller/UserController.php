<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserType;
use App\Entity\Adress;
use App\Entity\Techno;
use App\Entity\Poste;
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

        // persist the new user
        $user = new User;
        $user->setLastName($request->get('lastName'));
        $user->setFirstName($request->get('firstName'));
        $user->setUsername($request->get('username'));
        $user->setBirthDate($request->get('birthDate'));
        $user->setEmail($request->get('email'));
        $user->setUserType($em->getRepository(UserType::class)->findOneBy(['id' => (int)$request->get('userType')]));
        $user->setPoste($em->getRepository(Poste::class)->findOneBy(['id' => (int)$request->get('poste')]));
        $user->setPassword($request->get('password'));
        $user->setGender($request->get('gender'));

        if($request->get('adressId') !== null){
            $user->setAdress($em->getRepository(Adress::class)->findOneBy(['id' => (int)$request->get('adressId')]));
        }else{
            $adress = new Adress;
            $adress->setCp($request->get('cp'));
            $adress->setCity($request->get('city'));
            $adress->setAdress($request->get('adress'));
            $adress->setIsPrimary($request->get('isPrimaryAdress'));

            $user->setAdress($adress);

            $em->persist($adress);

            /*
                {
                    "lastName": "Nom",
                    "firstName": "Prénom",
                    "username": "username",
                    "email": "mail@domain.target",
                    "password": "123456",
                    "gender": "f",
                    "birthDate": "date('Y-m-d')",

                    "techno": ["techno1->id", "techno2->id", "techno3->id"...]
                    
                    "userType": "userType->id",

                    "poste": "userType->id",

                    // Ca (adresse existante) :
                    "adressId": "adress->id"

                    // Ou bien ca (nouvelle adresse) :
                    "cp": "12345",
                    "adress": "45 rue Jean Mermoz",
                    "city": "Toulouse",
                    "isPrimaryAdress": "0" // ou bien 1
                }
            */
        }
        if($request->get('techno') !== null){

            $technos = $request->get('techno');
            foreach($technos as $k => $v){
                $user->setTechno($em->getRepository(Techno::class)->findOneBy(['id' => $v]));          
            }
        }


        // dd($user);
        
        $em->persist($user);
        $em->flush();

        return $this->respondCreated($userRepository->transform($user));
    }

}
