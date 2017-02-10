<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 08.02.17
 * Time: 23:46
 */

namespace Coffeeman\TrainingDashboardManagement\ValueObjects\Training;

use Coffeeman\TrainingDashboardManagement\ValueObjects\ValueInterface;

class WorkoutTime implements ValueInterface
{
    private $workoutTime;

    public function __construct(\DateTime $workoutTime)
    {
        $this->workoutTime = $workoutTime;
    }

    public function getValue(): string
    {
        return $this->workoutTime->format('H:i:s');
    }
}