<?php

namespace Mongo\ExampleBundle\DataFixtures\MongoDB;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Mongo\ExampleBundle\Document\Category;
use Mongo\ExampleBundle\Document\CategoryTranslation;

class CategoryData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $food = new Category;
        $food->setTitle('Food');
        $food->addTranslation(new CategoryTranslation('lt', 'title', 'Maistas'));

        $fruits = new Category;
        $fruits->setTitle('Fruits');
        $fruits->addTranslation(new CategoryTranslation('lt', 'title', 'Vaisiai'));

        $apple = new Category;
        $apple->setTitle('Apple');
        $apple->addTranslation(new CategoryTranslation('lt', 'title', 'Obuolys'));

        $milk = new Category;
        $milk->setTitle('Milk');
        $milk->addTranslation(new CategoryTranslation('lt', 'title', 'Pienas'));

        $manager->persist($food);
        $manager->persist($milk);
        $manager->persist($fruits);
        $manager->persist($apple);
        $manager->flush();
    }
}