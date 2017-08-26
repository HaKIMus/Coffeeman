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
    private $workoutsRepository;
    private $workoutTypeRepository;
    private $workoutInformationRepository;

    public function __construct(WorkoutsInterface $workouts, WorkoutsTypesInterface $workoutType, WorkoutInformationInterface $workoutInformation)
    {
        $this->workoutsRepository = $workouts;
        $this->workoutTypeRepository = $workoutType;
        $this->workoutInformationRepository = $workoutInformation;
    }

    public function handle(CreateNewWorkout $command): void
    {
        $informationAboutWorkout = new InformationAboutWorkout(
            new WorkoutBurnedCalories(new BurnedCaloriesContract($command->getBurnedCalories())),
            new TimeOfWorkout(
                new WorkoutStartDate($command->getStartDate()),
                new WorkoutStopDate($command->getStopDate())),
            $this->workoutTypeRepository->getById($command->getWorkoutTypeId()));

        $workout = new Workout(
            $command->getSportsmanId(),
            $informationAboutWorkout
        );

        $this->workoutInformationRepository->add($informationAboutWorkout);
        $this->workoutsRepository->add($workout);

        $this->workoutsRepository->commit();
        $this->workoutTypeRepository->commit();
        $this->workoutInformationRepository->commit();
    }
}
