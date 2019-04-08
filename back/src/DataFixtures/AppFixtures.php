<?php

namespace App\DataFixtures;

use App\Entity\Poste;
use App\Entity\User;
use App\Entity\UserType;
use App\Entity\Adress;
use App\Entity\Techno;
use App\Entity\TechDomain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $userList = [];
        $posteList = [];
        $adressList = [];
        $technoList = [];
        $techDomainList = [];
        $userTypeList = [];

        // $product = new Product();
        // $manager->persist($product);
        for($i = 0 ; $i < 10 ; $i++){
            $poste = new Poste();
            $poste->setName('poste'.$i);
            if($i < 3){
                $poste->setHierarchy(0);
            }else if($i < 6){
                $poste->setHierarchy(1);
            }else if($i < 9){
                $poste->setHierarchy(2);
            }else{
                $poste->setHierarchy(3);
            }

            $manager->persist($poste);

            array_push($posteList, $poste);
        }

        $manager->flush();
        
        for($i = 0 ; $i < 10 ; $i++){
            $userType = new UserType();
            $userType->setName('userType'.$i);
            if($i%2 == 1){
                $userType->setExtends($userTypeList[$i-1]);
            }else{
                $userType->setExtends(null);
            }

            $manager->persist($userType);

            array_push($userTypeList, $userType);
        }

        $manager->flush();

        for($i = 0 ; $i < 20 ; $i++){
            $adress = new Adress();
            $adress->setCp($i);
            $adress->setAdress($i.' rue machin');
            $adress->setCity('city'.$i);
            if($i%2 == 0){
                $adress->setIsPrimary(1);
            }else{
                $adress->setIsPrimary(0);
            }

            $manager->persist($adress);

            array_push($adressList, $adress);
        }

        $manager->flush();

        for($i = 0 ; $i < 10 ; $i++){
            $techDomain = new TechDomain();
            $techDomain->setName('techDomain'.$i);

            $manager->persist($techDomain);

            array_push($techDomainList, $techDomain);
        }

        $manager->flush();

        for($i = 0 ; $i < 10 ; $i++){
            $techno = new Techno();
            $techno->setName('techno'.$i);
            $techno->setDomain($techDomainList[$i]);

            $manager->persist($techno);

            array_push($technoList, $techno);
        }

        $manager->flush();

        for($i = 0 ; $i < 10 ; $i++){
            $user = new User();
            $user->setUsername('user'.$i);
            $user->setUsernameCanonical('user'.$i);
            $user->setEmail('mail'.$i);
            $user->setEmailCanonical('mail'.$i);
            $user->setEnabled(1);
            $user->setFirstName('firstname'.$i);
            $user->setLastName('lastname'.$i);
            $user->setPassword('password'.$i);
            $user->setRoles(['a:1:{i:0;s:9:"ROLE_USER";}']);
            $user->setPoste($posteList[$i]);
            $user->setUserType($userTypeList[$i]);
            
            if($i%2 == 0){
                $user->setGender('f');
            }else{
                $user->setGender('h');
            }

            $manager->persist($user);

            array_push($userList, $user);
        }

        $manager->flush();

    }
}
