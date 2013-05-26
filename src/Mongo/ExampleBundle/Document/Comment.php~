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


    /**
     * Get id
     *
     * @return id $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param date $date
     * @return self
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Get date
     *
     * @return date $date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;
        return $this;
    }

    /**
     * Get text
     *
     * @return string $text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set content
     *
     * @param Mongo\ExampleBundle\Document\Content $content
     * @return self
     */
    public function setContent(\Mongo\ExampleBundle\Document\Content $content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return Mongo\ExampleBundle\Document\Content $content
     */
    public function getContent()
    {
        return $this->content;
    }
}
