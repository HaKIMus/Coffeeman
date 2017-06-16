<?php

namespace Coffeeman\Domain\Workout;

use Coffeeman\Domain\Workout\Property\WorkoutProperty;
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

    public function sumAllWorkouts(): void
    {
        $this->sumAllWorkouts = new SumAllWorkouts();
    }

    public function getSummaryAllWorkouts()
    {
        return $this->sumAllWorkouts->getSummary();
    }
}
