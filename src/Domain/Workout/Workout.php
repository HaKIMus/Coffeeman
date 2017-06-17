<?php

namespace Coffeeman\Domain\Workout;

use Coffeeman\Domain\Workout\Property\WorkoutProperty;
use Coffeeman\Domain\Workout\Type\WorkoutType;

class Workout
{
    private $id;

    private $workoutTypeId;

    private $workoutProperty;

    private $workoutStartedAt;

    private $workoutStoppedAt;

    public function __construct(
        WorkoutType $typeId,
        WorkoutProperty $property
    ){
        $this->workoutTypeId = $typeId;
        $this->workoutProperty = $property;
    }

    public function startWorkout()
    {
        $this->workoutStartedAt = new \DateTime();
    }

    public function stopWorkout()
    {
        if (!isset($this->workoutStartedAt)) {
            throw new \Exception('Workout have not started!');
        }

        $this->workoutStoppedAt = new \DateTime();
    }
}
