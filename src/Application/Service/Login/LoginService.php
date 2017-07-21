<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 15:35
 */

namespace Coffeeman\Application\Service\Login;

use Coffeeman\Application\Query\User\UserView;
use Coffeeman\Infrastructure\Service\Login\Login;
use Coffeeman\Infrastructure\Service\Dbal\UserByLoginData;

class LoginService
{
    /**
     * @TODO: Make LoginService as Command.
     */
    private $username;
    private $password;
    private $login;

    public function __construct(string $username, string $password, Login $login)
    {
        $this->username = $username;
        $this->password = $password;
        $this->login = $login;
    }

    public function login(UserByLoginData $userByLoginData): void
    {
        $this->login->loginByUsernameAndPassword($this->username, $this->password, $userByLoginData);
    }

    public function getUser(): UserView
    {
        return $this->login->getUser();
    }
}