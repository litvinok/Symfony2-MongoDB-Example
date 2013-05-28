<?php

namespace Mongo\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @MongoDB\Document
 * @Gedmo\Tree(type="nested")
 * @Gedmo\TranslationEntity(class="Document\CategoryTranslation")
 */
class Category
{
    /**
     * @MongoDB\Id
     */
    private $id;

    /**
     * @Gedmo\Translatable
     * @MongoDB\Field
     */
    private $title;

    /**
     * @Gedmo\Translatable
     * @MongoDB\Field
     */
    private $description;

    /**
     * @Gedmo\Translatable
     * @Gedmo\Slug(fields={"title"})
     * @MongoDB\Field
     */
    private $slug;

    /**
     * @Gedmo\TreeLeft
     * @MongoDB\Int
     */
    private $lft;

    /**
     * @Gedmo\TreeRight
     * @MongoDB\Int
     */
    private $rgt;

    /**
     * @Gedmo\TreeParent
     * @MongoDB\ReferenceOne(targetDocument="Category", inversedBy="children")
     */
    private $parent;

    /**
     * @Gedmo\TreeRoot
     * @MongoDB\Int
     */
    private $root;

    /**
     * @Gedmo\TreeLevel
     * @MongoDB\Int
     */
    private $level;

    /**
     * @MongoDB\ReferenceMany(targetDocument="Category", mappedBy="parent")
     */
    private $children;

    /**
     * @Gedmo\Timestampable(on="create")
     * @MongoDB\Date
     */
    private $created;

    /**
     * @Gedmo\Timestampable(on="update")
     * @MongoDB\Date
     */
    private $updated;

    /**
     * @Gedmo\Blameable(on="create")
     * @MongoDB\Field
     */
    private $createdBy;

    /**
     * @Gedmo\Blameable(on="update")
     * @MongoDB\Field
     */
    private $updatedBy;

    /**
     * @MongoDB\ReferenceMany(
     * targetDocument="CategoryTranslation",
     * mappedBy="object",
     * cascade={"persist", "remove"}
     * )
     */
    private $translations;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
    }

    public function getTranslations()
    {
        return $this->translations;
    }

    public function addTranslation(CategoryTranslation $t)
    {
        if (!$this->translations->contains($t)) {
            $this->translations[] = $t;
            $t->setObject($this);
        }
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    public function getParent()
    {
        return $this->parent;
    }

    public function getRoot()
    {
        return $this->root;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function getChildren()
    {
        return $this->children;
    }

    public function getLeft()
    {
        return $this->lft;
    }

    public function getRight()
    {
        return $this->rgt;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function getUpdated()
    {
        return $this->updated;
    }

    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}