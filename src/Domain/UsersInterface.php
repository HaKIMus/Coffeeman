<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.07.17
 * Time: 20:03
 */

namespace Coffeeman\Domain;

use Coffeeman\Domain\User\User;

interface UsersInterface
{
    public function getById(string $id): User;
    public function getAll(): array;
}
