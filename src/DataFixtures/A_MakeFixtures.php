<?php

namespace App\DataFixtures;

use App\Entity\Make;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class A_MakeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $make = new Make();
        $make->setName('Nissan');
        $manager->persist($make);

        $make1 = new Make();
        $make1->setName('Haval');
        $manager->persist($make1);

        $manager->flush();

        $this->addReference('make_1', $make);
        $this->addReference('make_2', $make1);
    }
}
