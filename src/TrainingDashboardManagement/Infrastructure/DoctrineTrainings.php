<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 21:59
 */

namespace Coffeeman\TrainingDashboardManagement\Infrastructure;

use Coffeeman\TrainingDashboardManagement\Domain\Training;
use Coffeeman\TrainingDashboardManagement\Domain\Trainings;
use Doctrine\ORM\EntityManager;

final class DoctrineTrainings implements Trainings
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(Training $training)
    {
        // TODO: Implement add() method.
    }

    public function getById(int $trainingId): Training
    {
        // TODO: Implement getById() method.
    }

    public function getAll(): array
    {
        // TODO: Implement getAll() method.
    }
}