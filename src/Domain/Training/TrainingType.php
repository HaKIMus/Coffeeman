<?php

namespace Coffeeman\Domain\Training;

class TrainingType
{
    private $trainingType;

    public function __construct(string $trainingType)
    {
        $this->trainingType = $trainingType;
    }

    public function getTrainingType(): string
    {
        return $this->trainingType;
    }
}

