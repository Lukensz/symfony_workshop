<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    const LAPTOP = 'category-laptop';
    const HDD = 'category-hdd';

    public function load(ObjectManager $manager)
    {
        $laptopCategory = new Category('Laptop');
        $manager->persist($laptopCategory);

        $hddCategory = new Category('HDD');
        $manager->persist($hddCategory);

        $manager->flush();

        $this->addReference(self::LAPTOP, $laptopCategory); // tablica pamięci dostępna między fixtures
        $this->addReference(self::HDD, $hddCategory);
    }

    public function getOrder()
    {
        return 1;
    }

}