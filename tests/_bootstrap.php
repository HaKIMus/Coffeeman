<?php
// This is global bootstrap for autoloading

require __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class CoffeemanDatabase
{
    public static function getDbParams()
    {
        return $dbParams = [
            'driver' => 'pdo_mysql',
            'user' => 'scrutinizer',
            'password' => 'scrutinizer',
            'dbname' => 'coffeeman',
            'host' => '127.0.0.1',
        ];
    }

    public static function getEntityManager()
    {
        $paths = [
            __DIR__ . '/../src/Domain/Workout'
        ];
        $isDevMode  = true;

        $dbParams = [
            'driver' => 'pdo_mysql',
            'user' => 'scrutinizer',
            'password' => 'scrutinizer',
            'dbname' => 'coffeeman',
            'host' => '127.0.0.1',
        ];

        $config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);

        return $entityManager;
    }
}