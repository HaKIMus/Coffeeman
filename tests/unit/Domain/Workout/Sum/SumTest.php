<?php

namespace Domain\Workout\Sum;

use Coffeeman\Domain\SumInterface;
use Coffeeman\Domain\SumStrategy;

class SumTest extends \Codeception\Test\Unit
{
    public function testSumAllWorkouts()
    {
        $mockSumObject = $this->getMockBuilder(SumInterface::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mockSumObject->method('sum');
        $mockSumObject->method('getSummary')
            ->willReturn([2]);

        $sum = new SumStrategy($mockSumObject);
        $sum->sum();
        $this->assertEquals([2], $sum->getSummary());
    }
}