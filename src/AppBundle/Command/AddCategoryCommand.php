<?php

namespace AppBundle\Command;

class AddCategoryCommand {

    private $name;

    /**
     * AddCategoryCommand constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }




}