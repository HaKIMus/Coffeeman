<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 08.02.17
 * Time: 23:45
 */

namespace Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training;

use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Exceptions\Training\BurnedCaloriesException;
use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\ValueInterface;

class BurnedCalories implements ValueInterface
{
    private $burnedCalories;

    public function __construct(int $burnedCalories)
    {
        if (!$this->validate($burnedCalories)) {
            throw new BurnedCaloriesException('Burned calories cannot be greater then 2000!');
        }

        $this->burnedCalories = $burnedCalories;
    }

    public function getValue(): int
    {
        return $this->burnedCalories;
    }

    private function validate($param): bool
    {
        return $param < 2000;
    }
}