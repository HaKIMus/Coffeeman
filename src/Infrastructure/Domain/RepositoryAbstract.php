<?php

namespace Coffeeman\Infrastructure\Domain;

use Doctrine\ORM\EntityManager;

abstract class RepositoryAbstract
{
    protected $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->entityManager->beginTransaction();
    }
}
