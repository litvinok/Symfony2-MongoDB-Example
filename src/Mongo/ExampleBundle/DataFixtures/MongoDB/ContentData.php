<?php

namespace Mongo\ExampleBundle\DataFixtures\MongoDB;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Mongo\ExampleBundle\Document\Comment;
use Mongo\ExampleBundle\Document\Content;

class ContentData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $page = new Content();

        $page -> setTitle('Example');
        $page -> setText( 'Hello!');

        $manager->persist($page);

            $comment = new Comment();

            $comment -> setName("Me");
            $comment -> setText(":)");
            $comment -> setContent($page);

            $manager->persist($comment);

        $manager->flush();
    }
}