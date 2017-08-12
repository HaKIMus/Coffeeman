<?php
namespace Tests\Infrastructure\Workout;

use Codeception\Test\Unit;
use Coffeeman\Domain\Contract\Workout\BurnedCaloriesContract;
use Coffeeman\Domain\Workout\Information\InformationAboutWorkout;
use Coffeeman\Domain\Workout\Information\TimeOfWorkout;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\Information\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\Information\WorkoutStartDate;
use Coffeeman\Domain\Workout\Information\WorkoutStopDate;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkout;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;
use Tests\Unit\CoffeemanDatabase;

class DoctrineWorkoutTest extends Unit
{
    private $doctrineWorkout;
    private $doctrineTypeWorkout;

    public function __construct()
    {
        parent::__construct();

        $this->doctrineWorkout = new DoctrineWorkout(CoffeemanDatabase::getEntityManager());
        $this->doctrineTypeWorkout = new DoctrineWorkoutType(CoffeemanDatabase::getEntityManager());
    }

    public function _after()
    {
        $this->doctrineTypeWorkout->rollback();
    }

    public function testAddWorkout()
    {
        $informationAboutWorkout = new InformationAboutWorkout(
            new WorkoutBurnedCalories(new BurnedCaloriesContract(200)),
            new TimeOfWorkout(
                new WorkoutStartDate(new \DateTime()),
                new WorkoutStopDate(new \DateTime())
            ),
            $this->doctrineTypeWorkout->getById(1)
        );

        $workout = new Workout(
            1,
            $informationAboutWorkout
        );

        $this->doctrineTypeWorkout->add($workout);
    }
}
