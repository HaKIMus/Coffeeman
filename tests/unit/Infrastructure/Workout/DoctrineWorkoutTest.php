<?php

namespace Tests\Infrastructure\Workout;

use Codeception\Test\Unit;
use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\WorkoutStartDate;
use Coffeeman\Domain\Workout\WorkoutStopDate;
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
            new WorkoutBurnedCalories(new BurnedCaloriesInteger(200)),
            new WorkoutStartDate(new \DateTime()),
            new WorkoutStopDate(new \DateTime()),
            $this->doctrineTypeWorkout->getById(2)
        );

        $this->doctrineTypeWorkout->add($workout);
    }

    public function testGetWorkoutById()
    {
        $workout = $this->doctrineWorkout->getById(1);

        $this->assertNotEmpty($workout);
        $this->isInstanceOf(Workout::class, $workout);
    }

    public function testGetAllWorkouts()
    {
        $workouts = $this->doctrineWorkout->getAll();

        $this->assertNotEmpty($workouts);
        $this->assertInternalType('array', $workouts);
    }
}
