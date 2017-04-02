<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:45
 */
namespace Coffeeman\Infrastructure\Domain\Workout;

use Coffeeman\Domain\WorkoutsTypesInterface;
use Coffeeman\Domain\Workout\WorkoutType;
use Coffeeman\Infrastructure\Domain\RepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DoctrineWorkoutType extends EntityRepository implements RepositoryInterface, WorkoutsTypesInterface
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

    public function getById(int $id): WorkoutType
    {
        return $this->entityManager->getRepository(WorkoutType::class)->find($id);
    }

    public function getAll(): array
    {
        return $this->entityManager->getRepository(WorkoutType::class)->findAll();
    }
}
