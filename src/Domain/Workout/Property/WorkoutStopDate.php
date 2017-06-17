<?php

namespace Coffeeman\Domain\Workout\Property;

final class WorkoutStopDate
{
    private $workoutStopDate;

    public function __construct(\DateTime $workoutStopDate)
    {
        $this->workoutStopDate = $workoutStopDate;
    }
}
