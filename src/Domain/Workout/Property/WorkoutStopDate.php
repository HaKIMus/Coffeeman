<?php

namespace Coffeeman\Domain\Workout\Property;

final class WorkoutStopDate
{
    private $workoutStopDate;

    public function __construct($workoutStopDate)
    {
        $this->workoutStopDate = $workoutStopDate;

        return $this;
    }
}
