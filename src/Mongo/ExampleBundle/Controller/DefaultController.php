<?php

namespace Mongo\ExampleBundle\Controller;

use Doctrine\ODM\MongoDB\Mapping\Annotations\ObjectId;
use Mongo\ExampleBundle\Document\Comment;
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
        $doctrine = $this->get('doctrine_mongodb');
        $content = $doctrine
            ->getRepository('MongoExampleBundle:Content')
            ->find($id);

        $comment = new Comment();

        $form = $this->createFormBuilder($comment)
            ->add('name', 'text')
            ->add('text', 'textarea')
            ->getForm();

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $comment -> setContent($content);

                $em = $doctrine->getManager();
                $em->persist($comment);
                $em->flush();

                return $this->redirect($this->generateUrl('mongo_example_content', array('id' => $id )));
            }
        }

        return $this->render('MongoExampleBundle:Default:content.html.twig', array(
            'content' => $content,
            'form' => $form->createView()
        ));
    }
}
