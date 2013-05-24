<?php

namespace Mongo\ExampleBundle\DataFixtures\MongoDB;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Mongo\ExampleBundle\Document\Content;

class ContentData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $page = new Content();

        $page -> setName('Example');
        $page -> setText('Hello!');

        $manager->persist($page);
        $manager->flush();
    }
}