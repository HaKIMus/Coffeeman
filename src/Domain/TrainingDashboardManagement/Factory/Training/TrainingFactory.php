<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:16
 */

namespace Domain\TrainingDashboardManagement\Factory\Training;

use Coffeeman\TrainingDashboardManagement\Entity\Training\Training;
use Coffeeman\TrainingDashboardManagement\Factory\FactoryInterface;
use Coffeeman\TrainingDashboardManagment\Factory\Exceptions\TrainingException;

class TrainingsFactory implements FactoryInterface
{
    public function create(): Training
    {
        if (!$this->validate(new Training())) {
            throw new TrainingException('Class does not exist!');
        }

        return new Training();
    }

    private function validate($param)
    {
        return class_exists($param);
    }
}