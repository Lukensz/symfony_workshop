<?php

namespace AppBundle\Entity;

class Product {

    /** @var  int */
    private $productId;

    /** @var  string */
    private $name;

    /** @var  Category */
    private $category;

    /**
     * Product constructor.
     * @param string $name
     * @param Category $category
     */
    public function __construct($name, Category $category)
    {
        $this->name = $name;
        $this->category = $category;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }
}