<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.07.17
 * Time: 20:12
 */

namespace Coffeeman\Application\Query;

use Coffeeman\Application\Query\User\UserView;

interface UserQueryInterface
{
    public function getById(string $id): UserView;
    public function getAll(): array;
}
