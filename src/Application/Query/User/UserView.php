<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.07.17
 * Time: 20:13
 */

namespace Coffeeman\Application\Query\User;

class UserView
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct(
        string $id = '',
        string $username = '',
        string $email = '',
        string $password = ''
    ){
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId(): string
    {
        return $this->id;
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
