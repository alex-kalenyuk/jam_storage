<?php

namespace AppBundle\Tests\Services;

use AppBundle\Services\JamJarService;

class JamJarServiceTest extends \PHPUnit_Framework_TestCase
{
    const COPIES_AMOUNT = 2;

    public function testCreateCopies()
    {
        $jamJar = $this->getMock('\AppBundle\Entity\JamJar');

        $entityManager = $this
            ->getMockBuilder('\Doctrine\ORM\EntityManager')
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->exactly(self::COPIES_AMOUNT))
            ->method('persist')
            ->with($this->equalTo($jamJar))
            ->will($this->returnValue(true));
        $entityManager->expects($this->exactly(self::COPIES_AMOUNT))
            ->method('flush')
            ->will($this->returnValue(true));

        $jamJarService = new JamJarService($entityManager);
        $jamJarService->createCopies($jamJar, self::COPIES_AMOUNT);

    }
}
