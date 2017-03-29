<?php

namespace Domain;

use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\WorkoutStartDate;
use Coffeeman\Domain\Workout\WorkoutStopDate;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;

class WorkoutTest extends \PHPUnit_Framework_TestCase
{
    public function testIsWorkoutCorrectlyWorking()
    {
        $assets = new \Assets();
        $assets->setEntityManager();

        $workoutType = new DoctrineWorkoutType($assets->getEntityManager());
        $type = $workoutType->getById(1);

        $workout = new Workout(
            new WorkoutBurnedCalories(new BurnedCaloriesInteger(50)),
            new WorkoutStartDate(new \DateTime('2017-03-27 20:30:00')),
            new WorkoutStopDate(new \DateTime()),
            $type
        );

        $this->assertNotEmpty($workout);
    }
}