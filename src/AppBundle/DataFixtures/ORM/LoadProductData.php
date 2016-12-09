<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Product;
use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadProductData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $dell = new Product('Dell 1233', $this->getReference(LoadCategoryData::LAPTOP));
        $manager->persist($dell);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

}