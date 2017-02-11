<?php

declare(strict_types = 1);

/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 08.02.17
 * Time: 18:23
 */

namespace Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\Training;

use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\ValueInterface;

class UserId implements ValueInterface
{
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function getValue(): int
    {
        return $this->id;
    }
}