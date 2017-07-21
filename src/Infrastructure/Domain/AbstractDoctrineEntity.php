<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 18:01
 */

namespace Coffeeman\Infrastructure\Domain;


use Doctrine\ORM\EntityManager;

abstract class AbstractDoctrineEntity
{
    protected $_em;

    public function __construct(EntityManager $entityManager)
    {
        $this->_em = $entityManager;
        $this->_em->beginTransaction();
    }
}
