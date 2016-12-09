<?php

namespace AppBundle\Service\Category;

use AppBundle\Repository\CategoryRepository;

class CategoryQueryService {

    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getList() {
        $categories = $this->categoryRepository->getList();

        $list = [];
        foreach ($categories as $category) {
            $list[] = [
                'categoryId' => $category->getCategoryId(),
                'name' => $category->getName()
            ];
        }

        return $list;
    }

}