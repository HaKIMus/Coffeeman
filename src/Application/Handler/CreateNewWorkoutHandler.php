<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 16:11
 */

namespace Coffeeman\Application\Handler;

use Coffeeman\Application\Command\CreateNewWorkout;
use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use Coffeeman\Domain\Workout\Property\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\Property\WorkoutProperty;
use Coffeeman\Domain\Workout\Property\WorkoutStartDate;
use Coffeeman\Domain\Workout\Property\WorkoutStopDate;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\Type\WorkoutType;
use Coffeeman\Domain\WorkoutsInterface;

final class CreateNewWorkoutHandler
{
    private $workouts;

    public function __construct(WorkoutsInterface $workouts)
    {
        $this->workouts = $workouts;
    }

    public function handle(CreateNewWorkout $command): void
    {
        $workout = new Workout(
            new WorkoutType($command->getWorkoutTypeId()),
            new WorkoutProperty(
                new WorkoutBurnedCalories(new BurnedCaloriesInteger($command->getBurnedCalories())),
                new WorkoutStartDate($command->getStartDate()),
                new WorkoutStopDate($command->getStopDate())
            )
        );

        $this->workouts->add($workout);
    }
}