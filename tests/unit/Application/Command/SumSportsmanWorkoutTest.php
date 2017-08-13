<?php
namespace Application\Query\Workout;


use Coffeeman\Application\Command\SumSportsmanWorkouts;

class SumSportsmanWorkoutTest extends \Codeception\Test\Unit
{
    public function testPassingDataShouldBeEquals()
    {
        $sumSportsmanWorkouts = new SumSportsmanWorkouts('user-id');
        $this->assertEquals('user-id', $sumSportsmanWorkouts->getSportsmanId());
    }
}