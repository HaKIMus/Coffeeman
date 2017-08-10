<?php

namespace Domain\Workout\Summary;

use Coffeeman\Domain\Workout\Sum\SumSportsmanWorkouts;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Tests\Unit\CoffeemanDatabase;

class SumAllWorkoutsTest extends \Codeception\Test\Unit
{
    public function testGetSummaryOfWorkouts()
    {
        $summary = [
            'burnedCalories' => 1720,
            'sportsmanId' => 1,
            'mostPopularWorkoutType' => 'CARDIO'
        ];

        $sumAllWorkouts = new SumSportsmanWorkouts();
        $sumAllWorkouts->sumData(
            new DbalWorkoutQuery(new Connection(CoffeemanDatabase::getDbParams(), new Driver())),
            1);
        $this->assertEquals($summary, $sumAllWorkouts->getSummary());
    }
}