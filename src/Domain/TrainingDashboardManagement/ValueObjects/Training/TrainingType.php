<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 08.02.17
 * Time: 18:42
 */

namespace Coffeeman\TrainingDashboardManagement\ValueObjects\Training;

use Coffeeman\TrainingDashboardManagement\ValueObjects\Exceptions\Training\TrainingTypeException;
use Coffeeman\TrainingDashboardManagement\ValueObjects\ValueInterface;

class TrainingType implements ValueInterface
{
    private $trainingType;

    public function __construct(string $trainingType)
    {
        if (!$this->validate($trainingType)) {
            throw new TrainingTypeException('Training type cannot be longer then 16 chars and need to be string!');
        }

        $this->trainingType = htmlspecialchars($trainingType);
    }

    public function getValue(): string
    {
        return $this->trainingType;
    }

    private function validate($param): bool
    {
        return strlen($param) < 16;
    }
}