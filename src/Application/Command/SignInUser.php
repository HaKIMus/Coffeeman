<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 16:51
 */

namespace Coffeeman\Application\Command;

class SignInUser
{
    private $username;
    private $password;

    public function __construct(
        string $username,
        string $password
    ) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
