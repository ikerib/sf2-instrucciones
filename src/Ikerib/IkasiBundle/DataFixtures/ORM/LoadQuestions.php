<?php
namespace Ikerib\IkasiBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ikerib\IkasiBundle\Entity\Question;

class LoadQuestions extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $questions = array(
            array('question' => '¿Is this the first question?', 'slug' => 'is-this-the-first-question', 'enabled'=>1),
            array('question' => '¿Is this the second question?', 'slug' => 'is-this-the-second-question', 'enabled'=>1),
            array('question' => '¿Is this the fourth question?', 'slug' => 'is-this-the-fourth-question', 'enabled'=>1),
            array('question' => '¿Is this the third question?', 'slug' => 'is-this-the-third-question', 'enabled'=>1),
            array('question' => '¿Is this the sixth question?', 'slug' => 'is-this-the-sixth-question', 'enabled'=>1),
            array('question' => '¿Is this question enabled?', 'slug' => 'is-this-question-enabled', 'enabled'=>0),
            array('question' => '¿Is this very question enabled?', 'slug' => 'is-this-question-enabled', 'enabled'=>1),
        );

        foreach ($questions as $q) {
            $entity = new Question();
            $entity->setQuestion($q['question']);
            $entity->setSlug($q['slug']);
            $entity->setCreatedAt(new \DateTime());
            $entity->setUpdatedAt(new \DateTime());
            $entity->setEnabled($q['enabled']);
            $manager->persist($entity);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}