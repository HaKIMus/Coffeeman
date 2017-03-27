<?php

namespace Coffeeman\Domain\Workout;

/**
 * WorkoutBurnedCalories
 */
class WorkoutBurnedCalories
{
    /**
     * @var integer
     */
    private $workoutBurnedCalories;

    /**
     * WorkoutBurnedCalories constructor.
     * @param $workoutBurnedCalories
     */
    public function __construct($workoutBurnedCalories)
    {
        $this->workoutBurnedCalories = $workoutBurnedCalories;
    }
}

