<?php

namespace Coffeeman\Domain\Training;

class TrainingId
{
    private $trainingId;

    public function __construct(int $trainingId)
    {
        $this->trainingId = $trainingId;
    }

    public function getTrainingId(): int
    {
        return $this->trainingId;
    }
}

