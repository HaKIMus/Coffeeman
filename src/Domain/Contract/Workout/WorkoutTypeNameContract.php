<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 13.05.17
 * Time: 20:17
 */

namespace Coffeeman\Domain\Contract\Workout;

use Coffeeman\Domain\Contract\ContractInterface;

final class WorkoutTypeNameContract implements ContractInterface
{
    const MIN_LENGTH = 2;
    const MAX_LENGTH = 64;
    private $value;

    public function __construct(string $value)
    {
        if (strlen($value) > self::MAX_LENGTH ||
            strlen($value) < self::MIN_LENGTH ||
            empty($value)
        ) {
            throw new \InvalidArgumentException("Value: $value cannot be larger than " . self::MAX_LENGTH . " characters | cannot be smaller than " . self::MIN_LENGTH . " characters | cannot be empty");
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
