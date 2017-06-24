<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:46
 */

namespace Coffeeman\Infrastructure\Domain;

interface RepositoryInterface
{
    public function rollback(): void;
    public function commit(): void;
    public function add($entity): void;
    public function remove($entity): void;
}
