<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.07.17
 * Time: 19:59
 */

namespace Coffeeman\Application\Command;

class CreateNewUser
{
    private $username;
    private $email;
    private $password;

    public function __construct(
        string $username,
        string $email,
        string $password
    ){
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
