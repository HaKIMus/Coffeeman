<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 27.03.17
 * Time: 21:43
 */
namespace Coffeeman\Domain;

interface WorkoutsInterface
{
    public function getById(int $id);
    public function getAll();
}
