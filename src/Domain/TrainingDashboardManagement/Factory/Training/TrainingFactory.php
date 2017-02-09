<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 23:16
 */

namespace Coffeeman\TrainingDashboardManagement\Factory\Training;

use Coffeeman\TrainingDashboardManagement\Entity\Training\Training;
use Coffeeman\TrainingDashboardManagement\Factory\FactoryInterface;
use Coffeeman\TrainingDashboardManagment\Factory\Exceptions\TrainingException;

class TrainingFactory implements FactoryInterface
{
    public function create(): Training
    {
        return new Training();
    }
}