<?php

namespace Coffeeman\Domain\Workout;

/**
 * WorkoutStopDate
 */
class WorkoutStopDate
{
    /**
     * @var \DateTime
     */
    private $workoutStopDate;

    /**
     * WorkoutStopDate constructor.
     * @param $workoutStopDate
     */
    public function __construct($workoutStopDate)
    {
        $this->workoutStopDate = $workoutStopDate;

        return $this;
    }
}

