<?php

namespace Coffeeman\Domain\Workout;

class WorkoutStartDate
{
    private $workoutStartDate;

    public function __construct($workoutStartDate)
    {
        $this->workoutStartDate = $workoutStartDate;
    }
}
