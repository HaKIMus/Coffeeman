<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 08.02.17
 * Time: 17:04
 */

namespace Coffeeman\TrainingDashboardManagement\Entity\Training;

use Coffeeman\TrainingDashboardManagement\ValueObjects\Training\BurnedCalories;
use Coffeeman\TrainingDashboardManagement\ValueObjects\Training\TrainingType;
use Coffeeman\TrainingDashboardManagement\ValueObjects\Training\UserId;
use Coffeeman\TrainingDashboardManagement\ValueObjects\Training\WorkoutTime;

class Training
{
    private $trainingId;
    private $userId;
    private $trainingType;
    private $burnedCalories;
    private $workoutTime;

    public function getTrainingId(): int
    {
        return $this->trainingId;
    }

    public function setTrainingId(int $trainingId): void
    {
        $this->trainingId = $trainingId;
    }

    public function getUserId(): UserId
    {
        return $this->userId;
    }

    public function setUserId(UserId $userId): void
    {
        $this->userId = $userId;
    }

    public function getTrainingType(): TrainingType
    {
        return $this->trainingType;
    }

    public function setTrainingType(TrainingType $trainingType): void
    {
        $this->trainingType = $trainingType;
    }

    public function getBurnedCalories(): BurnedCalories
    {
        return $this->burnedCalories;
    }

    public function setBurnedCalories(BurnedCalories $burnedCalories): void
    {
        $this->burnedCalories = $burnedCalories;
    }

    public function getWorkoutTime(): WorkoutTime
    {
        return $this->workoutTime;
    }

    public function setWorkoutTime(WorkoutTime $workoutTime): void
    {
        $this->workoutTime = $workoutTime;
    }
}