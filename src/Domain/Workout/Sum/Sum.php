<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 18.06.17
 * Time: 17:36
 */

namespace Coffeeman\Domain\Workout\Sum;

use Coffeeman\Application\Query\WorkoutQueryInterface;

class Sum
{
    private $sumObject;

    public function __construct(SumInterface $sumObject)
    {
        $this->sumObject = $sumObject;
    }

    public function allWorkouts(WorkoutQueryInterface $workoutQuery, int $sportsmanId): void
    {
        $this->sumObject->sumData($workoutQuery, $sportsmanId);
    }

    public function getSummedAllWorkouts(): array
    {
        return $this->sumObject->getSummary();
    }
}