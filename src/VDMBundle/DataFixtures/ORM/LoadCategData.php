<?php

namespace VDMBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use VDMBundle\Entity\Categorie;

class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $moutarde = new Categorie();
        $moutarde->setTitle(Categorie::MOUTARDE);
        $manager->persist($moutarde);

        $apoil = new Categorie();
        $apoil->setTitle(Categorie::APOIL);
        $manager->persist($apoil);

        $celib = new Categorie();
        $celib->setTitle(Categorie::CELIB);
        $manager->persist($celib);

        $hotdog = new Categorie();
        $hotdog->setTitle(Categorie::HOTDOG);
        $manager->persist($hotdog);

        $manager->flush();
    }
}