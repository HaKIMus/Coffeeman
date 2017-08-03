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
    private $sportsmanId;
    private $workoutTypeId;
    private $workoutPropertyId;
    private $burnedCalories;
    private $workoutTypeName;
    private $workoutStartDate;
    private $workoutStopDate;

    public function __construct(
        int $sportsmanId = 0,
        int $workoutTypeId = 0,
        int $workoutPropertyId = 0,
        string $workoutTypeName = '',
        int $burnedCalories = 0,
        string $workoutStartDate = '',
        string $workoutStopDate = ''
    ){
        $this->sportsmanId = $sportsmanId;
        $this->workoutTypeId = $workoutTypeId;
        $this->workoutPropertyId = $workoutPropertyId;
        $this->workoutTypeName = $workoutTypeName;
        $this->burnedCalories = $burnedCalories;
        $this->workoutStartDate = $workoutStartDate;
        $this->workoutStopDate = $workoutStopDate;
    }

    public function getSportsmanId(): int
    {
        return $this->sportsmanId;
    }

    public function getWorkoutTypeId(): int
    {
        return $this->workoutTypeId;
    }

    public function getWorkoutPropertyId(): int
    {
        return $this->workoutPropertyId;
    }

    public function getWorkoutTypeName(): string
    {
        return $this->workoutTypeName;
    }

    public function getBurnedCalories(): int
    {
        return $this->burnedCalories;
    }

    public function getWorkoutStartDate(): string
    {
        return $this->workoutStartDate;
    }

    public function getWorkoutStopDate(): string
    {
        return $this->workoutStopDate;
    }
}
