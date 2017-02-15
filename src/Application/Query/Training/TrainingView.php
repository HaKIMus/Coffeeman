<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 22:19
 */

namespace Coffeeman\Application\Query\Training;

use Coffeeman\Domain\Training\BurnedCalories;
use Coffeeman\Domain\Training\TrainingId;
use Coffeeman\Domain\Training\TrainingType;
use Coffeeman\Domain\Training\UserId;
use Coffeeman\Domain\Training\WorkoutTime;

final class TrainingView
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
