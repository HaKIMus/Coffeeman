<?php
// This is global bootstrap for autoloading


namespace Tests\Unit;

require __DIR__ . '/../vendor/autoload.php';

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class CoffeemanDatabase
{
    public static function getDbParams()
    {
        return $dbParams = [
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'coffeeman_test',
            'host' => '127.0.0.1',
        ];
    }

    public static function getEntityManager()
    {
        $paths = [
            __DIR__ . '/../src/Domain/Workout',
            __DIR__ . '/../src/Domain/User'
        ];
        $isDevMode  = true;

        $config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create(self::getDbParams(), $config);

        return $entityManager;
    }

    public static function getConnection(): Connection
    {
        return new Connection(CoffeemanDatabase::getDbParams(), new Driver());
    }
}
