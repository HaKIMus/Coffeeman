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
    private $burnedCalories;

    private $startDate;

    private $stopDate;

    private $workoutTypeId;

    public function __construct(
        int $burnedCalories,
        string $startDate,
        string $stopDate,
        int $type
    ){
        $this->burnedCalories = $burnedCalories;
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
        $this->workoutTypeId = $type;
    }

    public function getBurnedCalories(): int
    {
        return $this->burnedCalories;
    }

    public function getStartDate(): string
    {
        return $this->startDate;
    }

    public function getStopDate(): string
    {
        return $this->stopDate;
    }

    public function getWorkoutTypeId(): string
    {
        return $this->workoutTypeId;
    }
}
