<?php

namespace Coffeeman\Domain\Workout\Property;

use Coffeeman\Domain\Contract\BurnedCaloriesContract;

final class WorkoutBurnedCalories
{
    private $workoutBurnedCalories;

    public function __construct(BurnedCaloriesContract $workoutBurnedCalories)
    {
        $this->workoutBurnedCalories = $workoutBurnedCalories->getValue();
    }
}
