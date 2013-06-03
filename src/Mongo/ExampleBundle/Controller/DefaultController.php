<?php

namespace Mongo\ExampleBundle\Controller;

use Doctrine\ODM\MongoDB\Mapping\Annotations\ObjectId;
use Mongo\ExampleBundle\Document\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Tests\Fixtures\ConstraintAValidator;

class DefaultController extends Controller
{
    public function indexAction( Request $request)
    {
        $doctrine = $this->get('doctrine_mongodb');

        $items = $doctrine
            ->getRepository('MongoExampleBundle:Content')
            ->findBy(array());

        $dbs = $doctrine -> getConnection() -> getMongo() -> listDBs();
        $path = $doctrine -> getRepository('MongoExampleBundle:Path') -> childrenHierarchy();

        return $this->render('MongoExampleBundle:Default:index.html.twig', array(
            'items' => $items,
            'dbs' => $dbs,
            'path' => $path,
        ));
    }

    public function contentAction( Request $request, $id )
    {
        $doctrine = $this->get('doctrine_mongodb');
        $content = $doctrine
            ->getRepository('MongoExampleBundle:Content')
            ->find($id);

        $repo = $doctrine -> getRepository('Gedmo\Loggable\Document\LogEntry');

        $content -> setText( $content -> getText() . ' '. rand(1,10) );

        $em = $doctrine->getManager();
        $em->persist($content);
        $em->flush();

        $history = $repo->getLogEntries($content);

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
            'history' => $history,
            'form' => $form->createView()
        ));
    }
}
