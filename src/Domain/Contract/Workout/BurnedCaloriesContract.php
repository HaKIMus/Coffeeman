<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 28.03.17
 * Time: 22:37
 */

namespace Coffeeman\Domain\Contract\Workout;

use Coffeeman\Domain\Contract\ContractInterface;

final class BurnedCaloriesContract implements ContractInterface
{
    const MIN_VALUE = 50;
    const MAX_VALUE = 2000;
    private $value;

    public function __construct(int $value)
    {
        if ($value < self::MIN_VALUE ||
            $value > self::MAX_VALUE
        ) {
            throw new \InvalidArgumentException('Burned Calories cannot be greater than ' . self::MAX_VALUE . ' and not less than ' . self::MIN_VALUE);
        }

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
