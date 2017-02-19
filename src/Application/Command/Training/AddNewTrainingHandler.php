<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 20:37
 */

namespace Coffeeman\Application\Command\Training;

use Coffeeman\Domain\Training\BurnedCalories;
use Coffeeman\Domain\Training\Training;
use Coffeeman\Domain\Training\TrainingId;
use Coffeeman\Domain\Training\TrainingType;
use Coffeeman\Domain\Training\UserId;
use Coffeeman\Domain\Training\WorkoutTime;
use Coffeeman\Domain\Trainings;

final class AddNewTrainingHandler
{
    private $trainings;

    public function __construct(Trainings $trainings)
    {
        $this->trainings = $trainings;
    }

    public function handle(AddNewTraining $command)
    {
        $training = new Training(
            new TrainingId($command->getId()->getTrainingId()),
            new UserId($command->getUserId()->getUserId()),
            new TrainingType($command->getTrainingType()->getTrainingType()),
            new BurnedCalories($command->getBurnedCalories()->getBurnedCalories()),
            new WorkoutTime($command->getWorkoutTime()->getWorkoutTime())
        );

        $this->trainings->add($training);
    }
}