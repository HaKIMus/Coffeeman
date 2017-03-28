<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 28.03.17
 * Time: 22:57
 */

namespace Coffeeman\Application\Query;

use Coffeeman\Application\Query\Workout\WorkoutView;

interface WorkoutQuery
{
    public function getById(int $id): WorkoutView;
    public function getAll(): array;
}