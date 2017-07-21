<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 16:51
 */

namespace Coffeeman\Application\Command;

use Coffeeman\Application\CommandInterface;
use Doctrine\DBAL\Connection;

class SignInUser implements CommandInterface
{
    private $username;
    private $password;
    private $connection;

    public function __construct(string $username, string $password, Connection $connection)
    {
        $this->username = $username;
        $this->password = $password;
        $this->connection = $connection;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getConnection(): Connection
    {
        return $this->connection;
    }
}
