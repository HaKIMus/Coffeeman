<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 6/14/17
 * Time: 3:10 AM
 */

namespace Coffeeman\Domain\Workout\Sum;

use Coffeeman\Application\Query\WorkoutQueryInterface;

class SumAllWorkouts
{
    private $summary = [];

    private $workoutDbal;

    private $sportsmanId;

    public function __construct(WorkoutQueryInterface $workoutDbal, int $sportsmanId)
    {
        $this->sportsmanId = $sportsmanId;
        $this->workoutDbal = $workoutDbal;

        $this->sumData();
    }

    public function getSummary(): array
    {
        return $this->summary;
    }

    private function sumData(): void
    {
        $informationAboutSportsman = $this->workoutDbal->getBySportsmanId($this->sportsmanId);

        $this->summary['burnedCalories'] = 0;
        foreach ($informationAboutSportsman as $information) {
            $this->summary['sportsmanId'] = $information->getSportsmanId();
            $this->summary['workoutTypeId'] = $information->getWorkoutTypeId();
            $this->summary['workoutPropertyId'] = $information->getWorkoutPropertyId();
            $this->summary['burnedCalories'] += $information->getBurnedCalories();
        }
    }

    private function sumMostUsedWorkoutType() {

    }

    private function sumSpendTimeOnWorkouts() {}
}
