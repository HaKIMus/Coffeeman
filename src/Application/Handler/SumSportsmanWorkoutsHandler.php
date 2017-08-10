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
    private $workoutQuery;
    private $workoutTypeQuery;
    private $sumStrategy;

    public function __construct(WorkoutQueryInterface $workoutQuery, WorkoutTypeQueryInterface $workoutTypeQuery)
    {
        $this->workoutQuery = $workoutQuery;
        $this->workoutTypeQuery = $workoutTypeQuery;
    }

    public function handle(SumSportsmanWorkoutsCommand $sumSportsmanWorkouts): void
    {
        $this->sumStrategy = new SumStrategy(new SumSportsmanWorkouts($this->workoutQuery, $this->workoutTypeQuery, $sumSportsmanWorkouts->getSportsmanId()));
        $this->sumStrategy->sum();

        $_SESSION['summedSportsmanWorkouts'] = $this->sumStrategy->getSum();
    }
}