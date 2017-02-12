<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 21:31
 */

namespace Coffeeman\TrainingDashboardManagement\Domain;

final class Training
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