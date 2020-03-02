<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    //The Initial Data
    public function load(ObjectManager $manager):void
    {
        // $product = new Product();
        // $product->setName('NameProduct');
        // $manager->persist($product);
        $designCategory=new Category();
        $designCategory->setName('Design');
        $manager->persist($designCategory);
        $programmingCategory= new Category();
        $programmingCategory->setName('Programming');
        $manager->persist($programmingCategory);
        $administratorCategory=new Category();
        $administratorCategory->setName('Administrator');
        $manager->persist($administratorCategory);
        $managerCategory=new Category();
        $managerCategory->setName('Manager');
        $manager->persist($managerCategory);
        $manager->flush();
        $this->addReference('category-design',$designCategory);
        $this->addReference('category-programming',$programmingCategory);
        $this->addReference('category-manager',$managerCategory);
        $this->addReference('category-administrator',$administratorCategory);
            }
}
