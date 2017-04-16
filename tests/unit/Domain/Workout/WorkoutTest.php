<?php

namespace Tests\Domain;

use Codeception\Test\Unit;
use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use Coffeeman\Domain\Workout\Property\WorkoutProperty;
use Coffeeman\Domain\Workout\Type\WorkoutTypeName;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\Property\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\Property\WorkoutStartDate;
use Coffeeman\Domain\Workout\Property\WorkoutStopDate;
use Coffeeman\Domain\Workout\Type\WorkoutType;

class WorkoutTest extends Unit
{
    public function testIsWorkoutCorrectlyWorking()
    {
        $workout = new Workout(
            new WorkoutType(
                new WorkoutTypeName('Hello World')
            ),
            new WorkoutProperty(
                new WorkoutBurnedCalories(new BurnedCaloriesInteger(50)),
                new WorkoutStartDate(new \DateTime('2017-03-27 20:30:00')),
                new WorkoutStopDate(new \DateTime())
            )
        );

        $this->assertNotEmpty($workout);
    }
}