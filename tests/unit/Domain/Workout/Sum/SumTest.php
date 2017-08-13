<?php
namespace Domain\Workout\Sum;


use Coffeeman\Domain\SumStrategy;
use Coffeeman\Domain\Workout\Sum\SumSportsmanWorkouts;

class SumTest extends \Codeception\Test\Unit
{
    public function testSumAllWorkouts()
    {
        $mockSumObject = $this->getMockBuilder(SumSportsmanWorkouts::class)
            ->disableOriginalConstructor()
            ->getMock();

        $sum = new SumStrategy($mockSumObject);
        $sum->sum();
    }
}