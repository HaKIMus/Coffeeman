<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 20:37
 */

namespace Coffeeman\Application\Command;

use Coffeeman\Domain\Training\BurnedCalories;
use Coffeeman\Domain\Training\Training;
use Coffeeman\Domain\Training\TrainingId;
use Coffeeman\Domain\Training\TrainingType;
use Coffeeman\Domain\Training\WorkoutTime;
use Coffeeman\Domain\Trainings;

final class AddNewTrainingHandler
{
    private $trainings;

    public function __construct(Trainings $trainings)
    {
        $this->trainings = $trainings;
    }

    public function handle(Training $command)
    {
        $training = new Training(
            new TrainingId(1),
            new TrainingType('HIIT'),
            new BurnedCalories(200),
            new WorkoutTime('20:30:40')
        );

        $this->trainings->add($training);
    }
}