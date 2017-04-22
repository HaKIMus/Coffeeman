<?php

namespace Coffeeman\Domain\Workout\Property;

final class WorkoutStartDate
{
    private $workoutStartDate;

    public function __construct($workoutStartDate)
    {
        $this->workoutStartDate = $workoutStartDate;
    }
}
