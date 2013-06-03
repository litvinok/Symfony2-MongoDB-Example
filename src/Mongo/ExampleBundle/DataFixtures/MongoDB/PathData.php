<?php

namespace Mongo\ExampleBundle\DataFixtures\MongoDB;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Mongo\ExampleBundle\Document\Path;

class PathData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $food = new Path();
        $food->setTitle('Food');

        $manager->persist($food);
        $manager->flush();


        $fruits = new Path();
        $fruits->setTitle('Fruits');
        $fruits->setParent($food);

        $manager->persist($fruits);
        $manager->flush();


        $meat = new Path();
        $meat->setTitle('Meat');
        $meat->setParent($food);

        $manager->persist($meat);
        $manager->flush();


        $manager->flush();
    }
}