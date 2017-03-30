<?php

namespace Coffeeman\Domain\Workout;

class WorkoutStopDate
{
    private $workoutStopDate;

    public function __construct($workoutStopDate)
    {
        $this->workoutStopDate = $workoutStopDate;
    }
}
