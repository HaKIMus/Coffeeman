<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 18:22
 */

namespace Coffeeman\Domain\Workout\Information;


class TimeOfWorkout
{
    private $id;

    private $workoutStartDate;

    private $workoutStopDate;

    public function __construct
    (
        WorkoutStartDate $workoutStartDate,
        WorkoutStopDate $workoutStopDate
    ) {
        $this->workoutStartDate = $workoutStartDate;
        $this->workoutStopDate = $workoutStopDate;
    }
}
