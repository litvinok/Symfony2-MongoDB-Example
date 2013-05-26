<?php

namespace Mongo\ExampleBundle\Controller;

use Doctrine\ODM\MongoDB\Mapping\Annotations\ObjectId;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction( Request $request)
    {

        $items = $this->get('doctrine_mongodb')
            ->getRepository('MongoExampleBundle:Content')
            ->findBy(array());

        return $this->render('MongoExampleBundle:Default:index.html.twig', array(
            'items' => $items
        ));
    }

    public function contentAction( Request $request, $id )
    {

        $item = $this->get('doctrine_mongodb')
            ->getRepository('MongoExampleBundle:Content')
            ->find($id);

        return $this->render('MongoExampleBundle:Default:content.html.twig', array(
            'item' => $item
        ));
    }
}
