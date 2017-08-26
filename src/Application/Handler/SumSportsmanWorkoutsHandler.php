<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 17:14
 */

namespace Coffeeman\Application\Handler;

use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Application\Query\WorkoutQueryInterface;
use Coffeeman\Application\Query\WorkoutTypeQueryInterface;
use Coffeeman\Domain\SumStrategy;
use Coffeeman\Domain\Workout\Sum\SumSportsmanWorkouts;
use Coffeeman\Application\Command\SumSportsmanWorkouts as SumSportsmanWorkoutsCommand;

class SumSportsmanWorkoutsHandler implements CommandHandlerInterface
{
    private $dbalWorkoutQuery;
    private $dbalWorkoutTypeQuery;

    public function __construct(WorkoutQueryInterface $workoutQuery, WorkoutTypeQueryInterface $workoutTypeQuery)
    {
        $this->dbalWorkoutQuery = $workoutQuery;
        $this->dbalWorkoutTypeQuery = $workoutTypeQuery;
    }

    public function handle(SumSportsmanWorkoutsCommand $sumSportsmanWorkouts): void
    {
        $sumStrategy = new SumStrategy(new SumSportsmanWorkouts($this->dbalWorkoutQuery, $this->dbalWorkoutTypeQuery, $sumSportsmanWorkouts->getSportsmanId()));
        $sumStrategy->sum();

        $_SESSION['user']['summedSportsmanWorkouts'] = $sumStrategy->getSummary();
    }
}
