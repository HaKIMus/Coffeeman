<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 03.07.17
 * Time: 13:58
 */

namespace Coffeeman\Domain\User;

class User
{
    private $id;

    private $username;

    private $password;

    private $email;

    public function __construct(
        string $id,
        Username $username,
        Email $email,
        Password $password
    ) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
}
