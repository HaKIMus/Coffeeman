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

    public function __construct(\DateTime $startTime, \DateTime $endTime)
    {
        $this->workoutTime = $this->convertToWorkoutTime($startTime, $endTime);
    }

    public function getValue()
    {
        return $this->workoutTime;
    }

    private function convertToWorkoutTime(\DateTime $start, \DateTime $end)
    {
        $this->workoutTime = $start->diff($end);
        return $this->workoutTime->format('%H %i %s');
    }
}