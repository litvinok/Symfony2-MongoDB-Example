<?php

namespace Mongo\ExampleBundle\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @MongoDB\Document
 */
class Content
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
    protected $title;

    /**
     * @MongoDB\String
     */
    protected $text;

    /** @MongoDB\ReferenceMany( targetDocument="Comment", mappedBy="content", sort={"date"="desc"} ) */
    public $comments;

    function __construct()
    {
        $this->date = new \DateTime();
        $this->comments = new ArrayCollection();
    }
}
