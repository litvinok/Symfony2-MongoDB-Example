<?php

namespace Mongo\ExampleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction( Request $request)
    {
        return $this->render('MongoExampleBundle:Default:index.html.twig', array(

        ));
    }
}
