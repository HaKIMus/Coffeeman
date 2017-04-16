<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 28.03.17
 * Time: 22:37
 */

namespace Coffeeman\Domain\Validation;

use \InvalidArgumentException;

class BurnedCaloriesInteger
{
    private $value;

    public function __construct(int $value)
    {
        if ($value < 50 || $value > 2000) {
            throw new InvalidArgumentException('Value cannot be greater than 2000 and not less than 50!');
        }

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}