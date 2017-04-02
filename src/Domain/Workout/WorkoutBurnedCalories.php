<?php

namespace Coffeeman\Domain\Workout;

use Coffeeman\Domain\Validation\BurnedCaloriesInteger;

class WorkoutBurnedCalories
{
    private $workoutBurnedCalories;

    public function __construct(BurnedCaloriesInteger $workoutBurnedCalories)
    {
        $this->workoutBurnedCalories = $workoutBurnedCalories->getValue();
    }
}
