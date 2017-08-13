<?php

namespace Coffeeman\Domain\Workout\Information;

use Coffeeman\Domain\Contract\Workout\BurnedCaloriesContract;

final class WorkoutBurnedCalories
{
    private $workoutBurnedCalories;

    public function __construct(BurnedCaloriesContract $workoutBurnedCalories)
    {
        $this->workoutBurnedCalories = $workoutBurnedCalories->getValue();
    }
}
