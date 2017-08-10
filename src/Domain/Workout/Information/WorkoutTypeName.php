<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.04.17
 * Time: 13:51
 */

namespace Coffeeman\Domain\Workout\Information;

use Coffeeman\Domain\Contract\Workout\WorkoutTypeNameContract;

final class WorkoutTypeName
{
    private $name;

    public function __construct(WorkoutTypeNameContract $name)
    {
        $this->name = $name->getValue();
    }
}
