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
}

