<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 07:33
 */

namespace Coffeeman\Application\Query\Workout;


class WorkoutTypeView
{
    private $id;
    private $workoutTypeName;

    public function __construct(
        int $id,
        string $workoutTypeName
    ) {
        $this->id = $id;
        $this->workoutTypeName = $workoutTypeName;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getWorkoutTypeName(): string
    {
        return $this->workoutTypeName;
    }
}