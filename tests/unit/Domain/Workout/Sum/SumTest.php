<?php
namespace Domain\Workout\Sum;


use Coffeeman\Domain\Workout\Sum\Sum;
use Coffeeman\Domain\Workout\Sum\SumAllWorkouts;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;

class SumTest extends \Codeception\Test\Unit
{
    public function testSumAllWorkouts()
    {
        $mockSumObject = $this->getMockBuilder(SumAllWorkouts::class)
            ->getMock();

        $mockDBALWorkoutQuery = $this->getMockBuilder(DbalWorkoutQuery::class)
            ->disableOriginalConstructor()
            ->getMock();

        $sum = new Sum($mockSumObject);
        $sum->allWorkouts($mockDBALWorkoutQuery, 1);
    }
}