<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:31
 */

namespace Coffeeman\TrainingDashboardManagement\Domain\Hydrator\Training;

use Coffeeman\TrainingDashboardManagement\Domain\Entity\Training\Training;
use Coffeeman\TrainingDashboardManagement\Domain\Mapping\Training\TrainingFields;
use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training\BurnedCalories;
use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training\TrainingId;
use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training\TrainingType;
use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training\UserId;
use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training\WorkoutTime;

class DefaultTrainingHydrator implements TrainingHydratorInterface
{
    public function extract(Training $training): array
    {
        return [
            TrainingFields::TRAINING_ID => $training->getTrainingId()->getValue(),
            TrainingFields::USER_ID => $training->getUserId()->getValue(),
            TrainingFields::TRAINING_TYPE => $training->getTrainingType()->getValue(),
            TrainingFields::BURNED_CALORIES => $training->getBurnedCalories()->getValue(),
            TrainingFields::WORKOUT_TIME => $training->getWorkoutTime()->getValue(),
        ];
    }

    public function hydrate(Training $training, array $trainingData): Training
    {
        $training->setTrainingId(
            new TrainingId($trainingData[TrainingFields::TRAINING_ID])
        );

        $training->setUserId(
            new UserId($trainingData[TrainingFields::USER_ID])
        );

        $training->setTrainingType(
            new TrainingType($trainingData[TrainingFields::TRAINING_TYPE])
        );

        $training->setBurnedCalories(
            new BurnedCalories($trainingData[TrainingFields::BURNED_CALORIES])
        );

        $training->setWorkoutTime(
            new WorkoutTime($trainingData[TrainingFields::WORKOUT_TIME])
        );

        return $training;
    }
}