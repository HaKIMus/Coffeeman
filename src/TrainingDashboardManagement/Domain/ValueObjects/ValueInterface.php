<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 09.02.17
 * Time: 18:37
 */

namespace Coffeeman\TrainingDashboardManagement\Domain\ValueObjects;

interface ValueInterface
{
    /**
     * @return mixed
     */
    public function getValue();
}