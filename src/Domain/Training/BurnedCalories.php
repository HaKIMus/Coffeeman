<?php

namespace Coffeeman\Domain\Training;

class BurnedCalories
{
    private $burnedCalories;

    public function __construct(int $burnedCalories)
    {
        $this->burnedCalories = $burnedCalories;
    }

    public function getBurnedCalories(): int
    {
        return $this->burnedCalories;
    }
}

