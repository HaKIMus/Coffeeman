<?php

namespace Coffeeman\Domain\Workout\Information;

class WorkoutType
{
    private $id;

    private $name;

    public function __construct(WorkoutTypeName $workoutTypeName)
    {
        $this->name = $workoutTypeName;
    }
}
