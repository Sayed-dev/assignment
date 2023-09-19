<?php

namespace App\DataFixtures;

use App\Entity\Make;
use App\Entity\Model;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class B_ModelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $model = new Model();
        $model->setName('Titan');
        $model->setMake($this->getReference('make_1'));
        $manager->persist($model);

        $model1 = new Model();
        $model1->setName('Juke');
        $model1->setMake($this->getReference('make_1'));
        $manager->persist($model1);

        $model2 = new Model();
        $model2->setName('Haval Jolion');
        $model2->setMake($this->getReference('make_2'));
        $manager->persist($model2);

        $model3 = new Model();
        $model3->setName('Haval H6');
        $model3->setMake($this->getReference('make_2'));
        $manager->persist($model3);

        $manager->flush();

        $this->addReference('model_1', $model);
        $this->addReference('model_2', $model1);
        $this->addReference('model_3', $model2);
        $this->addReference('model_4', $model3);
    }
}
 