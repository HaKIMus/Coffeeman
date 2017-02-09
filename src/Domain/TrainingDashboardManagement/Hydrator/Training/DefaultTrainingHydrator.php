<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:31
 */

namespace Coffeeman\TrainingDashboardManagement\Hydrator\Training;

use Coffeeman\TrainingDashboardManagement\Entity\Training\Training;
use Coffeeman\TrainingDashboardManagement\Mapping\Training\TrainingFields;
use Coffeeman\TrainingDashboardManagement\ValueObjects\Training\TrainingId;

/**
 * @Todo: It should have a interface.
 */
class DefaultTrainingHydrator
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

        return $training;
    }
}