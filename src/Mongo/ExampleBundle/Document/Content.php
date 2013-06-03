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
     * Set title
     *
     * @param string $title
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * Get title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
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
     * Add comments
     *
     * @param Mongo\ExampleBundle\Document\Comment $comments
     */
    public function addComment(\Mongo\ExampleBundle\Document\Comment $comments)
    {
        $this->comments[] = $comments;
    }

    /**
    * Remove comments
    *
    * @param <variableType$comments
    */
    public function removeComment(\Mongo\ExampleBundle\Document\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return Doctrine\Common\Collections\Collection $comments
     */
    public function getComments()
    {
        return $this->comments;
    }
}
