<?php

namespace Mongo\ExampleBundle\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Gedmo\Translatable\Document\MappedSuperclass\AbstractPersonalTranslation;

/**
 * @MongoDB\Document
 */
class CategoryTranslation extends AbstractPersonalTranslation
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
     * @MongoDB\ReferenceOne(targetDocument="Category", inversedBy="translations")
     */
    protected $object;
}