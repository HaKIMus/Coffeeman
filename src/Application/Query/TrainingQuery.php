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
use Coffeeman\Domain\Training\Training;

interface TrainingQuery
{
    public function add(Training $training);

    public function getById(int $trainingId): TrainingView;

    public function getAll(): array;
}