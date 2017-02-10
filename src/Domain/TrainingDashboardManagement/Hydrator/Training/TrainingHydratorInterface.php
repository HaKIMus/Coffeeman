<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.02.17
 * Time: 14:38
 */

namespace Domain\TrainingDashboardManagement\Hydrator\Training;


use Coffeeman\TrainingDashboardManagement\Entity\Training\Training;

interface InterfaceTrainingHydrator
{
    public function extract(Training $training): array;

    public function hydrate(Training $training, array $trainingData): Training;
}