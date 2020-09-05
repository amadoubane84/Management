<?php

namespace App\DataFixtures;

use App\Entity\Gestion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class GestionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for($i=0;$i<100;$i++){
            $enr_gestion = new Gestion();
            $enr_gestion->setMarches($faker->text(rand(50, 300)))
                        ->setMaitreOuvrage($faker->company())
                        ->setProjets($faker->catchPhrase())
                        ->setContrat($faker->randomElement($array = array ('Disponible','Pas disponible','En cours')))
                        ->setMontantFCFATTC($faker->numberBetween('1500000','15000000'));
            $manager->persist($enr_gestion);
        }
        $manager->flush();
    }
}
