<?php

namespace Mongo\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @MongoDB\Document(repositoryClass="Gedmo\Tree\Document\MongoDB\Repository\MaterializedPathRepository")
 * @Gedmo\Tree(type="materializedPath", activateLocking=true)
 *
 */
class Path {
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @MongoDB\Field(type="string")
     * @Gedmo\TreePathSource
     */
    private $title;

    /**
     * @MongoDB\Field(type="string")
     * @Gedmo\TreePath(separator="|")
     */
    private $path;

    /**
     * @Gedmo\TreeParent
     * @MongoDB\ReferenceOne(targetDocument="Path")
     */
    private $parent;

    /**
     * @Gedmo\TreeLevel
     * @MongoDB\Field(type="int")
     */
    private $level;

    /**
     * @Gedmo\TreeLockTime
     * @MongoDB\Field(type="date")
     */
    private $lockTime;

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
     * Set path
     *
     * @param string $path
     * @return self
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Get path
     *
     * @return string $path
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set parent
     *
     * @param Mongo\ExampleBundle\Document\Path $parent
     * @return self
     */
    public function setParent(\Mongo\ExampleBundle\Document\Path $parent)
    {
        $this->parent = $parent;
        return $this;
    }

    /**
     * Get parent
     *
     * @return Mongo\ExampleBundle\Document\Path $parent
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set level
     *
     * @param int $level
     * @return self
     */
    public function setLevel($level)
    {
        $this->level = $level;
        return $this;
    }

    /**
     * Get level
     *
     * @return int $level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set lockTime
     *
     * @param date $lockTime
     * @return self
     */
    public function setLockTime($lockTime)
    {
        $this->lockTime = $lockTime;
        return $this;
    }

    /**
     * Get lockTime
     *
     * @return date $lockTime
     */
    public function getLockTime()
    {
        return $this->lockTime;
    }
}
