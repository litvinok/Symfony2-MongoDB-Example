<?php

namespace Mongo\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @MongoDB\Document(collection="Content")
 * @Gedmo\Loggable
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
     * @Gedmo\Versioned
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
