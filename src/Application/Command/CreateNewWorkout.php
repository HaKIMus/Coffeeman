<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 16:16
 */

namespace Coffeeman\Application\Command;

use Coffeeman\Application\CommandInterface;

class CreateNewWorkout implements CommandInterface
{
    private $workoutTypeId;

    private $burnedCalories;

    private $startDate;

    private $stopDate;

    public function __construct(
        int $typeId,
        string $burnedCalories,
        \DateTime $startDate,
        \DateTime $stopDate
    ){
        $this->workoutTypeId = $typeId;
        $this->burnedCalories = $burnedCalories;
        $this->startDate = $startDate;
        $this->stopDate = $stopDate;
    }

    public function getWorkoutTypeId(): int
    {
        return $this->workoutTypeId;
    }

    public function getBurnedCalories(): int
    {
        return $this->burnedCalories;
    }

    public function getStartDate(): \DateTime
    {
        return $this->startDate;
    }

    public function getStopDate(): \DateTime
    {
        return $this->stopDate;
    }
}
