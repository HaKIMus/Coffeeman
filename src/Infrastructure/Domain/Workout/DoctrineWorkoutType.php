<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:45
 */
namespace Coffeeman\Infrastructure\Domain\Workout;


use Coffeeman\Domain\WorkoutsTypesInterface;
use Coffeeman\Infrastructure\Domain\RepositoryInterface;
use Coffeeman\Domain\Workout\Type\WorkoutType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DoctrineWorkoutType extends EntityRepository implements RepositoryInterface, WorkoutsTypesInterface
{
    public function __construct(EntityManager $entityManager)
    {
        $this->_em = $entityManager;
        $this->_em->beginTransaction();
    }

    public function rollback(): void
    {
        $this->_em->rollback();
    }

    public function commit(): void
    {
        $this->_em->flush();
        $this->_em->getConnection()->commit();
    }

    public function add($entity): void
    {
        if (!$this->_em->contains($entity)) {
            $this->_em->persist($entity);
        }
    }

    public function remove($entity): void
    {
        $this->_em->remove($entity);
    }

    public function getById(int $id): WorkoutType
    {
        return $this->_em->getRepository(WorkoutType::class)->find($id);
    }

    public function getAll(): array
    {
        return $this->_em->getRepository(WorkoutType::class)->findAll();
    }
}
