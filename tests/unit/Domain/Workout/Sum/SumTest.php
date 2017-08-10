<?php
namespace Domain\Workout\Sum;


use Coffeeman\Domain\Workout\Sum\SumStrategy;
use Coffeeman\Domain\Workout\Sum\SumSportsmanWorkouts;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;

class SumTest extends \Codeception\Test\Unit
{
    public function testSumAllWorkouts()
    {
        $mockSumObject = $this->getMockBuilder(SumSportsmanWorkouts::class)
            ->getMock();

        $mockDBALWorkoutQuery = $this->getMockBuilder(DbalWorkoutQuery::class)
            ->disableOriginalConstructor()
            ->getMock();

        $sum = new SumStrategy($mockSumObject);
        $sum->allSportsmanWorkouts($mockDBALWorkoutQuery, 1);
    }
}