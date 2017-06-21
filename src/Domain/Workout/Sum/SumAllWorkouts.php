<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 6/14/17
 * Time: 3:10 AM
 */

namespace Coffeeman\Domain\Workout\Sum;

use Coffeeman\Application\Query\WorkoutQueryInterface;

class SumAllWorkouts implements SumInterface
{
    private $summary = [];

    public function getSummary(): array
    {
        return $this->summary;
    }

    public function sumData(WorkoutQueryInterface $workoutDBAL, int $sportsmanId): void
    {
        $informationAboutSportsman = $workoutDBAL->getBySportsmanId($sportsmanId);
        $mostSportsmanPopularWorkout = $workoutDBAL->getBySportsmanIdMostPopularWorkoutType($sportsmanId)[0];

        $this->summary['burnedCalories'] = 0;
        foreach ($informationAboutSportsman as $information) {
            $this->summary['sportsmanId'] = $information->getSportsmanId();
            $this->summary['burnedCalories'] += $information->getBurnedCalories();
            $this->summary['mostPopularWorkoutType'] = $mostSportsmanPopularWorkout->getWorkoutTypeName();
        }
    }
}
