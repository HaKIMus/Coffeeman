<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 19.07.17
 * Time: 15:35
 */

namespace Coffeeman\Infrastructure\Domain;

use Doctrine\DBAL\Connection;

abstract class AbstractDBALQuery
{
    protected $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }
}