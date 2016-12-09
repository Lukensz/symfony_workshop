<?php

namespace AppBundle\Exception;

use Symfony\Component\Validator\ConstraintViolationListInterface;

class CommandValidationException extends \RuntimeException
{
    /** @var  ConstraintViolationListInterface */
    private $errors;

    public function setErrors(ConstraintViolationListInterface $errors) {
        $this->errors = $errors;
    }

    /**
     * @return ConstraintViolationListInterface
     */
    public function getErrors() {
        return $this->errors;
    }
}