<?php
namespace Ikerib\IkasiBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ikerib\IkasiBundle\Entity\Answer;

class LoadAnswers extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $entity = new Answer();
        $entity->setAnswer("Aupa");
        $entity->setCorrect(True);
        $manager->persist($entity);
        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}