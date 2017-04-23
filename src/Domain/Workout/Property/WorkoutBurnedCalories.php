<?php

namespace Coffeeman\Domain\Workout\Property;

use Coffeeman\Domain\Validation\BurnedCaloriesInteger;

final class WorkoutBurnedCalories
{
    private $workoutBurnedCalories;

    public function __construct(BurnedCaloriesInteger $workoutBurnedCalories)
    {
        $this->workoutBurnedCalories = $workoutBurnedCalories->getValue();
    }
}
