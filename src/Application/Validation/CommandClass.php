<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 21:41
 */

namespace Coffeeman\Application\Validation;

class CommandClass
{
    private $value;

    public function __construct(string $value)
    {
        if (!is_object($value)) {
            throw new \InvalidArgumentException();
        }

        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}