<?php

namespace Mongo\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @MongoDB\Document
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
     * @MongoDB\ReferenceMany( targetDocument="CategoryTranslation", mappedBy="object", cascade={"persist", "remove"} )
     */
    private $translations;

    public function __construct()
    {
        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
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
     * Set description
     *
     * @param string $description
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * Get description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return self
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * Get slug
     *
     * @return string $slug
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set created
     *
     * @param date $created
     * @return self
     */
    public function setCreated($created)
    {
        $this->created = $created;
        return $this;
    }

    /**
     * Get created
     *
     * @return date $created
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param date $updated
     * @return self
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
        return $this;
    }

    /**
     * Get updated
     *
     * @return date $updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set createdBy
     *
     * @param string $createdBy
     * @return self
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string $createdBy
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param string $updatedBy
     * @return self
     */
    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return string $updatedBy
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Add translations
     *
     * @param Mongo\ExampleBundle\Document\CategoryTranslation $translations
     */
    public function addTranslation(\Mongo\ExampleBundle\Document\CategoryTranslation $translations)
    {
        $this->translations[] = $translations;
    }

    /**
    * Remove translations
    *
    * @param <variableType$translations
    */
    public function removeTranslation(\Mongo\ExampleBundle\Document\CategoryTranslation $translations)
    {
        $this->translations->removeElement($translations);
    }

    /**
     * Get translations
     *
     * @return Doctrine\Common\Collections\Collection $translations
     */
    public function getTranslations()
    {
        return $this->translations;
    }
}
