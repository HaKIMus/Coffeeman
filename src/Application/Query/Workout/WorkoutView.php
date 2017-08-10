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
    private $informationAboutWorkout;
    private $burnedCalories;
    private $workoutTypeName;
    private $workoutStartDate;
    private $workoutStopDate;

    public function __construct(
        string $sportsmanId,
        int $workoutTypeId,
        int $informationAboutWorkout,
        string $workoutTypeName,
        int $burnedCalories,
        string $workoutStartDate,
        string $workoutStopDate
    ){
        $this->sportsmanId = $sportsmanId;
        $this->workoutTypeId = $workoutTypeId;
        $this->informationAboutWorkout = $informationAboutWorkout;
        $this->workoutTypeName = $workoutTypeName;
        $this->burnedCalories = $burnedCalories;
        $this->workoutStartDate = $workoutStartDate;
        $this->workoutStopDate = $workoutStopDate;
    }

    public function getSportsmanId(): string
    {
        return $this->sportsmanId;
    }

    public function getWorkoutTypeId(): int
    {
        return $this->workoutTypeId;
    }

    public function getInformationAboutWorkout(): int
    {
        return $this->informationAboutWorkout;
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
