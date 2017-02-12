<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 22:19
 */

namespace Coffeeman\TrainingDashboardManagement\Application\Query\Training;

final class TrainingView
{
    private $trainingId;
    private $userId;

    private $trainingType;
    private $burnedCalories;
    private $workoutTime;

    public function __construct(
        int $trainingId,
        int $userId,
        string $trainingType,
        string $burnedCalories,
        string $workoutTime
    ) {
        $this->trainingId = $trainingId;
        $this->userId = $userId;
        $this->trainingType = $trainingType;
        $this->burnedCalories = $burnedCalories;
        $this->workoutTime = $workoutTime;
    }

    public function getTrainingId(): int
    {
        return $this->trainingId;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getTrainingType(): string
    {
        return $this->trainingType;
    }

    public function getBurnedCalories(): string
    {
        return $this->burnedCalories;
    }

    public function getWorkoutTime(): string
    {
        return $this->workoutTime;
    }
}