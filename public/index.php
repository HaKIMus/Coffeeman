<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 26.03.17
 * Time: 13:23
 */

use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\WorkoutStartDate;
use Coffeeman\Domain\Workout\WorkoutStopDate;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;

require __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../config/cli-config.php';

$workoutType = new DoctrineWorkoutType($entityManager);
$type = $workoutType->getById(1);

$workout = new Workout(
    new WorkoutBurnedCalories(200),
    new WorkoutStartDate(new \DateTime('2017-03-27 20:30:00')),
    new WorkoutStopDate(new \DateTime()),
    $type
);

var_dump($workout);