<?php

namespace Domain\Workout\Summary;

use Coffeeman\Domain\Workout\Sum\SumAllWorkouts;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Tests\Unit\CoffeemanDatabase;

class SumAllWorkoutsTest extends \Codeception\Test\Unit
{
    public function testSomeFeature()
    {
        $summary = [
            'burnedCalories' => 60,
            'sportsmanId' => 1,
            'workoutTypeId' => 1,
            'workoutPropertyId' => 3
        ];

        $sumAllWorkouts = new SumAllWorkouts(
            new DbalWorkoutQuery(
                new Connection(CoffeemanDatabase::getDbParams(), new Driver())),
            1);
        $this->assertEquals($summary, $sumAllWorkouts->getSummary());
    }
}