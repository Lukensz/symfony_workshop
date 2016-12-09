<?php

namespace AppBundle\Entity;

use Assert\Assertion;

class Category {

    /** @var  int */
    private $categoryId;

    /** @var  string */
    private $name;

    /**
     * Category constructor.
     * @param int $categoryId
     * @param string $name
     */
    public function __construct($name)
    {
        Assertion::minLength($name, 2);
        Assertion::maxLength($name, 100);

        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


}