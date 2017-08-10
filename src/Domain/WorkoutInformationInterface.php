<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 19:48
 */

namespace Coffeeman\Domain;

use Coffeeman\Domain\Workout\Information\InformationAboutWorkout;

interface WorkoutInformationInterface
{
    public function getById(int $id): InformationAboutWorkout;
    public function getAll(): array;
}