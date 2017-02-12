<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 20:37
 */

namespace Coffeeman\TrainingDashboardManagement\Application\Command;

use Coffeeman\TrainingDashboardManagement\Domain\Training;

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
            new TrainingId($command->trainingId()),
            new UserId($command->commandId()),
            new TrainingType($command->trainingType()),
            new BurnedCalories($command->burnedCalories()),
            new StartTraining($command->workoutTime())
        );

        $this->trainings->add($training);
    }
}