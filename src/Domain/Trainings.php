<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 22:10
 */

namespace Coffeeman\Domain;

use Coffeeman\Domain\Training\Training;

interface Trainings
{
    public function add(Training $training);

    public function getById(int $trainingId): Training;

    public function getAll() : array;
}