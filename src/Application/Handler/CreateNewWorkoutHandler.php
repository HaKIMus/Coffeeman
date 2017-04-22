<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 16:11
 */

namespace Coffeeman\Application\Handler;

use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Application\CommandInterface;
use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use Coffeeman\Domain\Workout\Property\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\Property\WorkoutProperty;
use Coffeeman\Domain\Workout\Property\WorkoutStartDate;
use Coffeeman\Domain\Workout\Property\WorkoutStopDate;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\Type\WorkoutType;
use Coffeeman\Domain\WorkoutsInterface;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;

final class CreateNewWorkoutHandler implements CommandHandlerInterface
{
    private $workouts;

    public function __construct(WorkoutsInterface $workouts)
    {
        $this->workouts = $workouts;
    }

    public function handle(CommandInterface $command): void
    {
        /**
         * TODO: Replace with DependencyInjection
         */
        require __DIR__ . '/../../../config/cli-config.php';

        $workoutType = new DoctrineWorkoutType($entityManager);

        $workout = new Workout(
            $workoutType->getById($command->getWorkoutTypeId()),
            new WorkoutProperty(
                new WorkoutBurnedCalories(new BurnedCaloriesInteger($command->getBurnedCalories())),
                new WorkoutStartDate($command->getStartDate()),
                new WorkoutStopDate($command->getStopDate())
            )
        );

        $this->workouts->add($workout);
        $this->workouts->commit();
    }
}
