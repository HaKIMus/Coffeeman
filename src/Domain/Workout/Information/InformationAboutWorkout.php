<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 18:20
 */

namespace Coffeeman\Domain\Workout\Information;

class InformationAboutWorkout
{
    private $id;

    private $workoutBurnedCalories;

    private $timeOfWorkout;

    private $typeOfWorkout;

    public function __construct(
        WorkoutBurnedCalories $workoutBurnedCalories,
        TimeOfWorkout $timeOfWorkout,
        WorkoutType $workoutType
    ) {
        $this->workoutBurnedCalories = $workoutBurnedCalories;
        $this->timeOfWorkout = $timeOfWorkout;
        $this->typeOfWorkout = $workoutType;
    }
}
