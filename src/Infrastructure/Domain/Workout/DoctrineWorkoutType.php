<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:45
 */
namespace Coffeeman\Infrastructure\Domain\Workout;


use Coffeeman\Domain\Workout\Information\WorkoutType;
use Coffeeman\Domain\WorkoutsTypesInterface;
use Coffeeman\Infrastructure\Domain\AbstractDoctrineEntity;
use Coffeeman\Infrastructure\Domain\RepositoryInterface;

class DoctrineWorkoutType extends AbstractDoctrineEntity implements RepositoryInterface, WorkoutsTypesInterface
{
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
