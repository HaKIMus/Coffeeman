<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 29.03.17
 * Time: 22:24
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/cli-config.php';

$foo = new \Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkout($entityManager);
$foo->getById(1);