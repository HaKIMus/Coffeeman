<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:46
 */

namespace Coffeeman\Infrastructure\Domain;

interface Repository
{
    public function rollback();
    public function commit();
    public function add($entity);
    public function remove($entity);
}