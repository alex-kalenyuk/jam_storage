<?php

namespace AppBundle\Services;

use AppBundle\Entity\JamJar;
use Doctrine\ORM\EntityManager;

class JamJarService
{
    /**
     * @var EntityManager
     */
    private $em;

    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Create copies of entity
     *
     * @param JamJar $jamJar
     * @param integer $amount
     */
    public function createCopies(JamJar $jamJar, $amount)
    {
        for ($i = 0; $i < $amount; $i++) {
            $this->em->persist(clone $jamJar);
        }
        $this->em->flush();
    }
}
