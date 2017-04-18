<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:45
 */

namespace Coffeeman\Infrastructure\Domain\Workout;

use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\WorkoutsInterface;
use Coffeeman\Infrastructure\Domain\RepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DoctrineWorkout extends EntityRepository implements RepositoryInterface, WorkoutsInterface
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityManager->beginTransaction();
    }

    public function rollback(): void
    {
        $this->entityManager->rollback();
    }

    public function commit(): void
    {
        $this->entityManager->flush();
        $this->entityManager->getConnection()->commit();
    }

    public function add($entity): void
    {
        if (!$this->entityManager->contains($entity)) {
            $this->entityManager->persist($entity);
        }
    }

    public function remove($entity): void
    {
        $this->entityManager->remove($entity);
    }
    public function getById(int $id): Workout
    {
        return $this->entityManager->getRepository(Workout::class)->find($id);
    }

    public function getAll(): array
    {
        return $this->entityManager->getRepository(Workout::class)->findAll();
    }
}
