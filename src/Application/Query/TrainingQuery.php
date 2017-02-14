<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 23:06
 */

namespace Coffeeman\Application\Query;


use Coffeeman\Application\Query\Training\TrainingView;

interface TrainingQuery
{
    public function getById(int $userView): TrainingView;

    public function getAll(): array;
}