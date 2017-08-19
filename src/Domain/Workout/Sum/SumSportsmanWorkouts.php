<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 6/14/17
 * Time: 3:10 AM
 */

namespace Coffeeman\Domain\Workout\Sum;

use Coffeeman\Application\Query\WorkoutQueryInterface;
use Coffeeman\Application\Query\WorkoutTypeQueryInterface;
use Coffeeman\Domain\SumInterface;

class SumSportsmanWorkouts implements SumInterface
{
    private $summary = [];
    private $workoutDBALQuery;
    private $workoutTypeDBALQuery;
    private $sportsmanId;

    public function __construct(WorkoutQueryInterface $workoutQuery, WorkoutTypeQueryInterface $workoutTypeQuery, string $sportsmanId)
    {
        $this->workoutDBALQuery = $workoutQuery;
        $this->workoutTypeDBALQuery = $workoutTypeQuery;
        $this->sportsmanId = $sportsmanId;
    }

    public function sum(): void
    {
        $informationAboutSportsman = $this->workoutDBALQuery->getAllWorkoutsBySportsmanId($this->sportsmanId);
        $mostSportsmanPopularWorkout = $this->workoutTypeDBALQuery->getBySportsmanIdMostPopularWorkoutType($this->sportsmanId);

        $this->summary['burnedCalories'] = 0;
        foreach ($informationAboutSportsman as $information) {
            $this->summary['sportsmanId'] = $information->getSportsmanId();
            $this->summary['burnedCalories'] += $information->getBurnedCalories();
            $this->summary['mostFrequentWorkoutType'] = $mostSportsmanPopularWorkout->getWorkoutTypeName();
        }
    }

    public function getSummary(): array
    {
        return $this->summary;
    }
}
