<?php

namespace Mongo\ExampleBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;


/**
 * @MongoDB\Document
 */
class Comment
{
    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @mongoDB\Date
     */
    protected $date;

    /**
     * @MongoDB\String
     */
    protected $name;

    /**
     * @MongoDB\String
     */
    protected $text;

    /** @MongoDB\ReferenceOne(targetDocument="Content", inversedBy="comments") */
    public $content;

    public function __construct()
    {
        $this->date = new \DateTime();
    }
}
