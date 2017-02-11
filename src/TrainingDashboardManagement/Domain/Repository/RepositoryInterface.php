<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.02.17
 * Time: 00:03
 */

namespace Coffeeman\TrainingDashboardManagement\Domain\Repository\Training;


use Coffeeman\TrainingDashboardManagement\Domain\ValueObjects\ValueInterface;

interface RepositoryInterface
{
    public function findById(ValueInterface $value);

    public function findAll();
}