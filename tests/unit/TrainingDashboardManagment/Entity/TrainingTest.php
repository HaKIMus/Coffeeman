<?php

use Codeception\Test\Unit;

class TrainingTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $training;

    protected function _before()
    {
        $this->training = new Coffeeman\TrainingDashboardManagement\Entity\Training\Training();
    }

    protected function _after()
    {
    }

    // tests
    public function testCorrectlyResult()
    {
        $this->training->setTrainingId(new \Coffeeman\TrainingDashboardManagement\ValueObjects\Training\TrainingId(1));
        $this->tester->assertEquals(1, $this->training->getTrainingId());
    }
}