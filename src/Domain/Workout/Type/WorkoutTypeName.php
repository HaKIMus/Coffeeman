<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.04.17
 * Time: 13:51
 */

namespace Coffeeman\Domain\Workout\Type;

class WorkoutTypeName
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}
