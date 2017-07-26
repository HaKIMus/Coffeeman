<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.07.17
 * Time: 19:59
 */

namespace Coffeeman\Application\Command;


use Coffeeman\Application\CommandInterface;

class CreateNewUser implements CommandInterface
{
    private $id;
    private $username;
    private $email;
    private $password;

    public function __construct(
        string $id,
        string $username,
        string $email,
        string $password
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
