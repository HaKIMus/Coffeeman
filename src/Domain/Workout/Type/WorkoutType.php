<?php

namespace Coffeeman\Domain\Workout\Type;

class WorkoutType
{
    private $id;

    private $name;

    public function __construct(WorkoutTypeName $typeName)
    {
        $this->name = $typeName;
    }
}
