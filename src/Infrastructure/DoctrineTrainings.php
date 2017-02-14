<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 21:59
 */

namespace Coffeeman\Infrastructure;

use Coffeeman\Domain\Training\Training;
use Coffeeman\Domain\Trainings;
use Coffeeman\Domain\Exception\TrainingNotFoundException;
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
        $this->entityManager->persist($training);
        $this->entityManager->flush();
    }

    public function getById(int $trainingId): Training
    {
        $training = $this->entityManager->getRepository(Training::class)->findOneBy([
            'trainingId' => $trainingId
        ]);

        if ($training === null) {
            throw new TrainingNotFoundException("Training with ID: {$trainingId} not found!");
        }

        return $training;
    }

    public function getAll(): array
    {
        $trainings = $this->entityManager->getRepository(Training::class)->findAll();

        if ($trainings === null) {
            throw new TrainingNotFoundException();
        }

        return $trainings;
    }
}