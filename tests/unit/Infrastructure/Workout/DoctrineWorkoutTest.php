<?php

namespace Tests\Infrastructure\Workout;

use Codeception\Test\Unit;
use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use Coffeeman\Domain\Workout\Property\WorkoutProperty;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\Property\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\Property\WorkoutStartDate;
use Coffeeman\Domain\Workout\Property\WorkoutStopDate;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkout;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;

class DoctrineWorkoutTest extends Unit
{
    private $doctrineWorkout;
    private $doctrineTypeWorkout;

    public function __construct()
    {
        $this->doctrineWorkout = new DoctrineWorkout(\CoffeemanDatabase::getEntityManager());
        $this->doctrineTypeWorkout = new DoctrineWorkoutType(\CoffeemanDatabase::getEntityManager());
    }

    public function _after()
    {
        $this->doctrineTypeWorkout->rollback();
    }

    public function testAddWorkout()
    {
        $workout = new Workout(
            $this->doctrineTypeWorkout->getById(1),
            new WorkoutProperty(
                new WorkoutBurnedCalories(new BurnedCaloriesInteger(200)),
                new WorkoutStartDate(new \DateTime()),
                new WorkoutStopDate(new \DateTime())
            )
        );

        $this->doctrineTypeWorkout->add($workout);
    }

    public function testGetWorkoutById()
    {
        $workout = $this->doctrineWorkout->getById(1);

        $this->assertNotEmpty($workout);
        $this->isInstanceOf(Workout::class);
    }

    public function testGetAllWorkouts()
    {
        $workouts = $this->doctrineWorkout->getAll();

        $this->assertNotEmpty($workouts);
        $this->assertInternalType('array', $workouts);
    }
}
