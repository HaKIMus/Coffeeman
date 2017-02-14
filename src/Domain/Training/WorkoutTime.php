<?php

namespace Coffeeman\Domain\Training;

class WorkoutTime
{
    private $workoutTime;

    public function __construct(string $workoutTime)
    {
        $this->workoutTime = $workoutTime;
    }

    public function getWorkoutTime(): string
    {
        return $this->workoutTime;
    }
}

