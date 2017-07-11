<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 03.07.17
 * Time: 13:58
 */

namespace Coffeeman\Domain\User;

use Ramsey\Uuid\UuidInterface;

class User
{
    private $id;

    private $name;

    private $password;

    private $email;

    public function __construct(
        UuidInterface $id,
        Name $name,
        Password $password,
        Email $email
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
    }
}