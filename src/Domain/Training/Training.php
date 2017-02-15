<?php

namespace Coffeeman\Domain\Training;

class Training
{
    private $trainingId;

    private $userId;

    private $trainingType;

    private $burnedCalories;

    private $workoutTime;

    public function __construct(
        TrainingId $trainingId,
        UserId $userId,
        TrainingType $trainingType,
        BurnedCalories $burnedCalories,
        WorkoutTime $workoutTime
    ) {
        $this->trainingId = $trainingId;
        $this->userId = $userId;
        $this->trainingType = $trainingType;
        $this->burnedCalories = $burnedCalories;
        $this->workoutTime = $workoutTime;
    }

    public function getId(): TrainingId
    {
        return $this->trainingId;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function getTrainingType(): TrainingType
    {
        return $this->trainingType;
    }

    public function getBurnedCalories(): BurnedCalories
    {
        return $this->burnedCalories;
    }


    public function getWorkoutTime(): WorkoutTime
    {
        return $this->workoutTime;
    }
}

