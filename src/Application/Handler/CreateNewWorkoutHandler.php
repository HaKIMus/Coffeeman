<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 16:11
 */

namespace Coffeeman\Application\Handler;

use Coffeeman\Application\Command\CreateNewWorkout;
use Coffeeman\Application\CommandHandlerInterface;
use Coffeeman\Domain\Contract\Workout\BurnedCaloriesContract;
use Coffeeman\Domain\Workout\Information\TimeOfWorkout;
use Coffeeman\Domain\Workout\Information\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\Information\InformationAboutWorkout;
use Coffeeman\Domain\Workout\Information\WorkoutStartDate;
use Coffeeman\Domain\Workout\Information\WorkoutStopDate;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\WorkoutInformationInterface;
use Coffeeman\Domain\WorkoutsInterface;
use Coffeeman\Domain\WorkoutsTypesInterface;

final class CreateNewWorkoutHandler implements CommandHandlerInterface
{
    private $workouts;
    private $workoutType;
    private $workoutInformation;

    public function __construct(WorkoutsInterface $workouts, WorkoutsTypesInterface $workoutType, WorkoutInformationInterface $workoutInformation)
    {
        $this->workouts = $workouts;
        $this->workoutType = $workoutType;
        $this->workoutInformation = $workoutInformation;
    }

    public function handle(CreateNewWorkout $command): void
    {
        $informationAboutWorkout = new InformationAboutWorkout(
            new WorkoutBurnedCalories(new BurnedCaloriesContract($command->getBurnedCalories())),
            new TimeOfWorkout(
                new WorkoutStartDate($command->getStartDate()),
                new WorkoutStopDate($command->getStopDate())),
            $this->workoutType->getById($command->getWorkoutTypeId()));

        $workout = new Workout(
            $command->getSportsmanId(),
            $informationAboutWorkout
        );

        $this->workoutInformation->add($informationAboutWorkout);
        $this->workouts->add($workout);

        $this->workouts->commit();
        $this->workoutType->commit();
        $this->workoutInformation->commit();
    }
}
