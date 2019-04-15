<?php

namespace App\Controller;


use \Datetime;
use App\Entity\Techno;
use App\Entity\TechDomain;
use App\Entity\Adress;
use App\Entity\Poste;
use App\Entity\User;
use App\Entity\UserType;
use App\Form\UserFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Date;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;

class UserController extends ApiController
{
    /**
     * @Route("/api/user", name="userList")
     */
    public function list(UserRepository $userRepository)
    {
        $userList = $userRepository->transformAll();

        return $this->respond($userList) ;
    }
    
    /**
    * @Route("/api/user/add", methods="POST")
    */
    public function create(Request $request, UserRepository $userRepository, EntityManagerInterface $em)
    {
        $request = $this->transformJsonBody($request);
        // persist the new user
        $user = new User;
        $user->setLastName($request->get('lastName'));
        $user->setFirstName($request->get('firstName'));
        $user->setUsername($request->get('username'));
        $user->setBirthDate(\DateTime::createFromFormat("d/m/Y", $request->get('birthDate')));
        $user->setEmail($request->get('email'));
        $user->setUserType($em->getRepository(UserType::class)->findOneBy(['id' => (int)$request->get('userType')]));
        $user->setRoles(['a:1:{i:0;s:9:"ROLE_USER";}']);
        $user->setPoste($em->getRepository(Poste::class)->findOneBy(['id' => (int)$request->get('poste')]));
        $user->setPassword($request->get('password'));
        $gender = $request->get('gender') ;
        if($gender == 'Male'){
            $gender = 'm';
        }else if($gender == 'Female'){
            $gender = 'f';
        }else{
            $gender = 'o';
        }
        $user->setGender($gender);

        // dd($user);

        if($request->get('adress') !== null){
            $user->addAdress($em->getRepository(Adress::class)->findOneBy(['id' => (int)$request->get('adress')]));
        }



        if($request->get('newAdress') !== null){
            $newAdress = $request->get('newAdress');
            for($i = 0 ; $i < count($newAdress) ; $i++){
                $adress = new Adress;
                $adress->setCp($newAdress[$i]['cp']);
                $adress->setCity($newAdress[$i]['city']);
                $adress->setAdress($newAdress[$i]['adress']);
                $adress->setIsPrimary($newAdress[$i]['isPrimaryAdress']);
                $adress->addUser($user);

                $user->addAdress($adress);
                $em->persist($adress);
            }     
        }

        if($request->get('newTechnos') !== null){
            $newTechnos = $request->get('newTechnos');
            for($i = 0 ; $i < count($newTechnos) ; $i++){
                // dd($newTechnos[$i]['domain']);
                $tech = new Techno;
                $tech->setName($newTechnos[$i]['name']);
                $tech->setDomain($em->getRepository(TechDomain::class)->findOneBy(['id' => $newTechnos[$i]['domain']]));

                $em->persist($tech);
                $user->addTechno($tech);
            }      
        }
        
        // if($request->get('technos') !== null){
        //     $technos = $request->get('technos');
        //     foreach($technos as $k => $v){
        //         $user->addTechno($em->getRepository(Techno::class)->findOneBy(['id' => $v]));
        //     }     
        // }


        if($request->get('enabled')){
            $user->setEnabled($request->get('enabled'));
        }
        else{
            $user->setEnabled(false);
        }
        // return $this->respondCreated($userRepository->transform($user));


        /* {
                "lastName": "Nom",
                "firstName": "Prénom",
                "username": "username",
                "email": "mail@domain.target",
                "password": "123456",
                "gender": "f",
                "birthDate": "date('Y-m-d')",

                // Ca (Techno existantes) :
                "technos": ["techno1->id", "techno2->id", "techno3->id"...]
                // Ou bien ca (nouvelles techno) :
                "technos": [["name": 'nomTech', "domain": "domainTech"]...]
                
                "userType": "userType->id",

                "poste": "userType->id",

                // Ca (adresse existante) :
                "adressId": "adress->id"
                // Ou bien ca (nouvelle adresse) :
                "cp": "12345",
                "adress": "45 rue Jean Mermoz",
                "city": "Toulouse",
                "isPrimaryAdress": "0" // ou bien 1
            } */

        $em->persist($user);
        $em->flush();

        return $this->respondCreated($userRepository->transform($user));
    }

}
