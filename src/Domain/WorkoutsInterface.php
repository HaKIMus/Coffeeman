<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:43
 */
namespace Coffeeman\Domain;

use Coffeeman\Domain\Workout\Workout;

interface WorkoutsInterface
{
    public function getById(int $id): Workout;
    public function getAll(): array;
}