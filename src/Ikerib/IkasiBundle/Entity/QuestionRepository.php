<?php

namespace Ikerib\IkasiBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * QuestionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuestionRepository extends EntityRepository
{
    public function FindEnabledQuestions($availabily) {

        $em = $this->getEntityManager();

        $query = $em->createQuery('
            SELECT q
            FROM IkasiBundle:Question q
            WHERE q.enabled = :availabily
        ');

        $query->setParameter('availabily', $availabily);

        return $query->getResult();

    }

    public function FindEnabledQuestionsOneByOne($availabily, $from, $howmany) {

        $em = $this->getEntityManager();

        $query = $em->createQuery('
            SELECT q
            FROM IkasiBundle:Question q

            WHERE q.enabled = :availabily
        ');

        $query->setParameter('availabily', $availabily);
        $query->setFirstResult($from);
        $query->setMaxResults($howmany);

        return $query->getResult();

    }
}