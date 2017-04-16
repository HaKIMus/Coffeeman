<?php

namespace Coffeeman\Domain\Workout;

use Coffeeman\Domain\Workout\Property\WorkoutProperty;
use Coffeeman\Domain\Workout\Type\WorkoutType;

/**
 * Workout
 */
class Workout
{
    private $id;

    private $workoutTypeId;

    private $workoutPropertyId;

    public function __construct(
        WorkoutType $typeId,
        WorkoutProperty $propertyId
    ){
        $this->workoutTypeId = $typeId;
        $this->workoutPropertyId = $propertyId;
    }
}
