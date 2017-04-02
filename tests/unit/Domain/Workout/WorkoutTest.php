<?php

namespace Tests\Domain;

use Codeception\Test\Unit;
use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\WorkoutStartDate;
use Coffeeman\Domain\Workout\WorkoutStopDate;
use Coffeeman\Domain\Workout\WorkoutType;

class WorkoutTest extends Unit
{
    public function testIsWorkoutCorrectlyWorking()
    {
        $workout = new Workout(
            new WorkoutBurnedCalories(new BurnedCaloriesInteger(50)),
            new WorkoutStartDate(new \DateTime('2017-03-27 20:30:00')),
            new WorkoutStopDate(new \DateTime()),
            new WorkoutType()
        );

        $this->assertNotEmpty($workout);
    }
}