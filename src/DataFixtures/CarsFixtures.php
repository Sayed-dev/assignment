<?php

namespace App\DataFixtures;

use App\Entity\Cars;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $Car = new Cars();
        $Car->setYear(2019);
        $Car->setColor('Blue');
        $Car->setFuel('Eco');
        $Car->setPrice(5000);
        $Car->setModel($this->getReference('model_1'));
        $manager->persist($Car);

        $Car1 = new Cars();
        $Car1->setYear(2021);
        $Car1->setColor('Gold Paint');
        $Car1->setFuel('Eco');
        $Car1->setPrice(7000);
        $Car1->setModel($this->getReference('model_2'));
        $manager->persist($Car1);

        $Car2 = new Cars();
        $Car2->setYear(2023);
        $Car2->setColor('Red');
        $Car2->setFuel('Eco');
        $Car2->setPrice(8000);
        $Car2->setModel($this->getReference('model_3'));
        $manager->persist($Car2);

        $Car3 = new Cars();
        $Car3->setYear(2024);
        $Car3->setColor('Blue');
        $Car3->setFuel('Eco');
        $Car3->setPrice(9000);
        $Car3->setModel($this->getReference('model_4'));
        $manager->persist($Car3);

        $manager->flush();
    }
}
