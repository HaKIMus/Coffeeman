<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 16:51
 */

namespace Coffeeman\Application\Command;

use Coffeeman\Application\CommandInterface;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Doctrine\DBAL\Connection;

class SignInUser implements CommandInterface
{
    private $username;
    private $password;
    private $userBySignInData;

    public function __construct(string $username, string $password, GetUserBySignInData $userBySignInData)
    {
        $this->username = $username;
        $this->password = $password;
        $this->userBySignInData = $userBySignInData;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getUserBySignInData(): GetUserBySignInData
    {
        return $this->userBySignInData;
    }
}
