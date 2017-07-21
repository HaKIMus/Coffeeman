<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 7/11/17
 * Time: 1:25 AM
 */

namespace Coffeeman\Infrastructure\Domain\User;


use Coffeeman\Domain\User\User;
use Coffeeman\Domain\UsersInterface;
use Coffeeman\Infrastructure\Domain\RepositoryInterface;
use Doctrine\ORM\EntityManager;

class DoctrineUser implements RepositoryInterface, UsersInterface
{
    private $_em;

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

    public function getById(string $id): User
    {
        return $this->_em->getRepository(User::class)->find($id);
    }

    public function getAll(): array
    {
        return $this->_em->getRepository(User::class)->findAll();
    }
}