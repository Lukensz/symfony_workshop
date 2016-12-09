<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Category;

class CategoryRepository {

    /** @var  EntityManager */
    private $em;

    /**
     * CategoryRepository constructor.
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function add(Category $category) {
        $this->em->persist($category);
        $this->em->flush();
    }

    /**
     * @return Category[]
     */
    public function getList() {
        $qb = $this->em->createQueryBuilder()
            ->select('category')
            ->from(Category::class, 'category'); // category - nazwa obiektu który wyciągamy

        return $qb->getQuery()->getResult();
    }


}