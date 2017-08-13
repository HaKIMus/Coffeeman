<?php

namespace Coffeeman\Domain\Workout\Information;

final class WorkoutStopDate
{
    private $workoutStopDate;

    public function __construct(\DateTime $workoutStopDate)
    {
        $this->workoutStopDate = $workoutStopDate;
    }
}
