<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 07:35
 */

namespace Coffeeman\Application\Query;

use Coffeeman\Application\Query\Workout\WorkoutTypeView;

interface WorkoutTypeQueryInterface
{
    public function getById(int $id): WorkoutTypeView;

    public function getAll(): array;

    public function getBySportsmanIdMostPopularWorkoutType(string $sportsmanId): WorkoutTypeView;
}
