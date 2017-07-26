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
use Coffeeman\Infrastructure\Domain\AbstractDoctrineEntity;
use Coffeeman\Infrastructure\Domain\RepositoryInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DoctrineWorkout extends AbstractDoctrineEntity implements RepositoryInterface, WorkoutsInterface
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

    public function getById(int $id): Workout
    {
        return $this->_em->getRepository(Workout::class)->find($id);
    }

    public function getAll(): array
    {
        return $this->_em->getRepository(Workout::class)->findAll();
    }
}
