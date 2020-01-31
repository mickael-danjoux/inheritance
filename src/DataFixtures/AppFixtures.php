<?php

namespace App\DataFixtures;

use App\Entity\Company;
use App\Entity\PrivateIndividual;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;


use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $faker;

    private $encoder;
    private $manager;


    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->faker = Factory::create('fr_FR');
        $this->encoder = $encoder;
        $this->manager = ObjectManager::class;

    }

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 15; $i++){
            if(random_int(100, 999) % 2 === 0 ){
                $this->createCompany($manager);
            }else{
               $this->createIndividual($manager);
            }

        }
        $manager->flush();
    }

    public function createCompany(ObjectManager $manager):void
    {

        $user = new User();
        $user->setEmail($this->faker->email);
        $user->setPassword($this->encoder->encodePassword($user,"password"));

        $company = new Company();
        $company->setFirstName($this->faker->firstName);
        $company->setLastName($this->faker->lastName);
        $company->setAddress($this->faker->address);
        $company->setCity($this->faker->city);
        $company->setUser($user);

        $manager->persist($user);
        $manager->persist($company);

    }

    public function createIndividual(ObjectManager $manager):void
    {
        $user = new User();
        $user->setEmail($this->faker->email);
        $user->setPassword($this->encoder->encodePassword($user,"password"));

        $privateIndiv = new PrivateIndividual();
        $privateIndiv->setFirstName($this->faker->firstName);
        $privateIndiv->setLastName($this->faker->lastName);
        $privateIndiv->setUser($user);

        $manager->persist($user);
        $manager->persist($privateIndiv);
    }
}
