<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.04.17
 * Time: 11:47
 */

namespace Coffeeman\Domain\Workout\Property;

class WorkoutProperty
{
    private $id;

    private $burnedCalories;

    private $startDate;

    private $stopDate;

    public function __construct(
        WorkoutBurnedCalories $burnedCalories,
        WorkoutStartDate $startDate,
        WorkoutStopDate $stopDate
    ){
        $this->burnedCalories = $burnedCalories;
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
    }
}