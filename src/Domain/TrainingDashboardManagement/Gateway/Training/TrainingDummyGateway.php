<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:45
 */

namespace Coffeeman\TrainingDashboardManagement\Gateway\Training;

use Coffeeman\TrainingDashboardManagement\Gateway\GatewayInterface;
use Coffeeman\TrainingDashboardManagement\Mapping\Training\TrainingFields;

class TrainingDummyGateway implements GatewayInterface
{
    public function findAll(): array
    {
        return [
            [
                TrainingFields::TRAINING_ID => 1,
                TrainingFields::USER_ID => 1,
                TrainingFields::TRAINING_TYPE => 'HIIT',
                TrainingFields::BURNED_CALORIES => 235,
                TrainingFields::WORKOUT_TIME => '00:30:33',
            ],
            [
                TrainingFields::TRAINING_ID => 2,
                TrainingFields::USER_ID => 2,
                TrainingFields::TRAINING_TYPE => 'ABS',
                TrainingFields::BURNED_CALORIES => 260,
                TrainingFields::WORKOUT_TIME => '00:40:40',
            ]
        ];
    }

    public function findById(int $trainingId): array
    {
        return [
            TrainingFields::TRAINING_ID => 1,
            TrainingFields::USER_ID => 1,
            TrainingFields::TRAINING_TYPE => 'HIIT',
            TrainingFields::BURNED_CALORIES => 235,
            TrainingFields::WORKOUT_TIME => '00:30:33',
        ];
    }

    public function findOneBy(array $criteria): array
    {
        // TODO: Implement findOneBy() method.
    }

    public function updateOneBy(array $data, array $criteria): void
    {
        // TODO: Implement updateOneBy() method.
    }

    public function store(array $data): void
    {
        // TODO: Implement store() method.
    }
}