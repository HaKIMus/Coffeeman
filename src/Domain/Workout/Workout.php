<?php

namespace Coffeeman\Domain\Workout;

/**
 * Workout
 */
class Workout
{
    private $id;

    private $burnedCalories;

    private $startDate;

    private $stopDate;

    private $workoutTypeId;

    public function __construct(
        WorkoutBurnedCalories $burnedCalories,
        WorkoutStartDate $startDate,
        WorkoutStopDate $stopDate,
        WorkoutType $type
    ){
        $this->burnedCalories = $burnedCalories;
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
        $this->workoutTypeId = $type;
    }
}