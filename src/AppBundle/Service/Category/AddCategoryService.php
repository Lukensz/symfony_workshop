<?php

namespace AppBundle\Service\Category;

use AppBundle\Command\AddCategoryCommand;
use AppBundle\Entity\Category;
use AppBundle\Exception\CommandValidationException;
use AppBundle\Repository\CategoryRepository;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AddCategoryService {

    private $categoryRepository;
    private $validator;

    public function __construct(CategoryRepository $categoryRepository, ValidatorInterface $validator)
    {
        $this->categoryRepository = $categoryRepository;
        $this->validator = $validator;
    }

    public function add(AddCategoryCommand $command) {

        $errors = $this->validator->validate($command);

        if($errors->count()) {
            $exception = new CommandValidationException();
            $exception->setErrors($errors);
            throw $exception;
        }
        $category = new Category($command->getName());

        $this->categoryRepository->add($category);
    }
}