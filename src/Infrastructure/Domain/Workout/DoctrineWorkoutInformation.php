<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:45
 */

namespace Coffeeman\Infrastructure\Domain\Workout;

use Coffeeman\Domain\Workout\Information\InformationAboutWorkout;
use Coffeeman\Domain\WorkoutInformationInterface;
use Coffeeman\Infrastructure\Domain\AbstractDoctrineEntity;
use Coffeeman\Infrastructure\Domain\RepositoryInterface;

class DoctrineWorkoutInformation extends AbstractDoctrineEntity implements RepositoryInterface, WorkoutInformationInterface
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

    public function getById(int $id): InformationAboutWorkout
    {
        return $this->_em->getRepository(InformationAboutWorkout::class)->find($id);
    }

    public function getAll(): array
    {
        return $this->_em->getRepository(InformationAboutWorkout::class)->findAll();
    }
}
