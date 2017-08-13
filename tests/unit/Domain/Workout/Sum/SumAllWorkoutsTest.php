<?php

namespace Domain\Workout\Summary;

use Coffeeman\Domain\Workout\Sum\SumSportsmanWorkouts;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutTypeQuery;
use Tests\Unit\CoffeemanDatabase;

class SumAllWorkoutsTest extends \Codeception\Test\Unit
{
    public function testGetSummaryOfWorkouts()
    {
        $summary = [
            'burnedCalories' => 1670,
            'sportsmanId' => 'd6e66f53-843b-4dab-bb64-6faa91e5928e',
            'mostPopularWorkoutType' => 'HIIT'
        ];

        $sumAllWorkouts = new SumSportsmanWorkouts(
            new DbalWorkoutQuery(CoffeemanDatabase::getConnection()),
            new DbalWorkoutTypeQuery(CoffeemanDatabase::getConnection()),
            'd6e66f53-843b-4dab-bb64-6faa91e5928e');
        $sumAllWorkouts->sum();
        $this->assertEquals($summary, $sumAllWorkouts->getSummary());
    }
}