<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 15:41
 */

namespace Coffeeman\Infrastructure\Service\Login;

use Coffeeman\Application\Query\User\UserView;
use Coffeeman\Infrastructure\Service\Dbal\UserByLoginData;

final class Login
{
    private $user;

    public function loginByUsernameAndPassword(string $username, string $password, UserByLoginData $userByLoginData): void
    {
        $this->user = $userByLoginData->getUserByLoginData($username, $password);
    }

    public function getUser(): UserView
    {
        return $this->user;
    }
}