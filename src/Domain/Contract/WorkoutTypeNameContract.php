<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 13.05.17
 * Time: 20:17
 */

namespace Coffeeman\Domain\Contract;

final class WorkoutTypeNameContract implements ContractInterface
{
    private $value;

    public function __construct(string $value)
    {
        if (strlen($value) > 64 || strlen($value) < 2 || empty($value)) {
            throw new \InvalidArgumentException("Value: $value cannot be larger than 64 characters | cannot be smaller than 2 characters | cannot be empty");
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
