<?php

namespace Coffeeman\Domain\Workout;

/**
 * WorkoutStartDate
 */
class WorkoutStartDate
{
    /**
     * @var \DateTime
     */
    private $workoutStartDate;

    /**
     * WorkoutStartDate constructor.
     * @param $workoutStartDate
     */
    public function __construct($workoutStartDate)
    {
        $this->workoutStartDate = $workoutStartDate;
    }
}

