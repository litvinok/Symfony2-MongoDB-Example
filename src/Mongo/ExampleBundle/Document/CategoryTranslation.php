<?php

namespace Mongo\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Gedmo\Translatable\Document\MappedSuperclass\AbstractTranslation;

/**
 * @MongoDB\Document
 */
class CategoryTranslation extends AbstractTranslation
{
    /**
     * Convinient constructor
     *
     * @param string $locale
     * @param string $field
     * @param string $value
     */
    public function __construct($locale, $field, $value)
    {
        $this->setLocale($locale);
        $this->setField($field);
        $this->setContent($value);
    }

    /**
     * @MongoDB\Id
     */
    protected $id;

    /**
     * @MongoDB\ReferenceOne(targetDocument="Category", inversedBy="translations")
     */
    protected $object;
    /**
     * @var string $locale
     */
    protected $locale;

    /**
     * @var string $objectClass
     */
    protected $objectClass;

    /**
     * @var string $field
     */
    protected $field;

    /**
     * @var string $foreignKey
     */
    protected $foreignKey;

    /**
     * @var string $content
     */
    protected $content;


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
     * Set object
     *
     * @param Mongo\ExampleBundle\Document\Category $object
     * @return self
     */
    public function setObject(\Mongo\ExampleBundle\Document\Category $object)
    {
        $this->object = $object;
        return $this;
    }

    /**
     * Get object
     *
     * @return Mongo\ExampleBundle\Document\Category $object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Set locale
     *
     * @param string $locale
     * @return self
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
        return $this;
    }

    /**
     * Get locale
     *
     * @return string $locale
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * Set objectClass
     *
     * @param string $objectClass
     * @return self
     */
    public function setObjectClass($objectClass)
    {
        $this->objectClass = $objectClass;
        return $this;
    }

    /**
     * Get objectClass
     *
     * @return string $objectClass
     */
    public function getObjectClass()
    {
        return $this->objectClass;
    }

    /**
     * Set field
     *
     * @param string $field
     * @return self
     */
    public function setField($field)
    {
        $this->field = $field;
        return $this;
    }

    /**
     * Get field
     *
     * @return string $field
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set foreignKey
     *
     * @param string $foreignKey
     * @return self
     */
    public function setForeignKey($foreignKey)
    {
        $this->foreignKey = $foreignKey;
        return $this;
    }

    /**
     * Get foreignKey
     *
     * @return string $foreignKey
     */
    public function getForeignKey()
    {
        return $this->foreignKey;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return string $content
     */
    public function getContent()
    {
        return $this->content;
    }
}
