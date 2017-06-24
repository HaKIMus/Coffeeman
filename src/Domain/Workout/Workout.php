<?php

namespace Coffeeman\Domain\Workout;

use Coffeeman\Application\Query\WorkoutQueryInterface;
use Coffeeman\Domain\Workout\Property\WorkoutProperty;
use Coffeeman\Domain\Workout\Sum\Sum;
use Coffeeman\Domain\Workout\Sum\SumAllWorkouts;
use Coffeeman\Domain\Workout\Type\WorkoutType;

class Workout
{
    private $id;

    private $sportsmanId;

    private $workoutTypeId;

    private $workoutProperty;

    private $sumAllWorkouts;

    public function __construct(
        int $sportsmanId,
        WorkoutType $typeId,
        WorkoutProperty $property
    ){
        $this->sportsmanId = $sportsmanId;
        $this->workoutTypeId = $typeId;
        $this->workoutProperty = $property;
    }

    public function sumAllWorkouts(WorkoutQueryInterface $workoutQuery): void
    {
        $this->sumAllWorkouts = new Sum(new SumAllWorkouts());
        $this->sumAllWorkouts->allWorkouts($workoutQuery, 1);
    }

    public function getSummaryAllWorkouts()
    {
        return $this->sumAllWorkouts->getSummedAllWorkouts();
    }
}
