<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:45
 */

namespace Coffeeman\Infrastructure\Domain\Workout;

use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\Workouts;
use Coffeeman\Infrastructure\Domain\Repository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class DoctrineWorkout extends EntityRepository implements Repository, Workouts
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityManager->beginTransaction();
    }

    public function rollback()
    {
        $this->entityManager->rollback();
    }

    public function commit()
    {
        $this->entityManager->flush();
        $this->entityManager->getConnection()->commit();
    }

    public function add($entity)
    {
        if (!$this->entityManager->contains($entity)) {
            $this->entityManager->persist($entity);
        }
    }

    public function remove($entity)
    {
        $this->entityManager->remove($entity);
    }
    public function getById(int $id)
    {
        return $this->entityManager->getRepository(Workout::class)->find($id);
    }

    public function getAll()
    {
        return $this->entityManager->getRepository(Workout::class)->findAll();
    }
}