<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.07.17
 * Time: 14:27
 */

namespace Coffeeman\Application\Command;

class SignUpUser
{
    private $username;
    private $email;
    private $password;

    public function __construct(
        string $username,
        string $email,
        string $password
    ) {
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