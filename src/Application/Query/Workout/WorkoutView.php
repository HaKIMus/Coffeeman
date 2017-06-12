<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 28.03.17
 * Time: 22:58
 */

namespace Coffeeman\Application\Query\Workout;

class WorkoutView
{
    private $workoutTypeId;
    private $workoutPropertyId;

    public function __construct(
        int $workoutTypeId,
        int $workoutPropertyId
    ){
        $this->workoutTypeId = $workoutTypeId;
        $this->workoutPropertyId = $workoutPropertyId;
    }

    public function getWorkoutTypeId(): int
    {
        return $this->workoutTypeId;
    }

    public function getWorkoutPropertyId(): int
    {
        return $this->workoutPropertyId;
    }
}
