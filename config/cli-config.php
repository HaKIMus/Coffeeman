<?php

/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 26.03.17
 * Time: 13:23
 */

require __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [
    __DIR__ . '/../src/Domain/Workout',
    __DIR__ . '/../src/Domain/User'
];

$isDevMode  = true;
$dbParams = [
    'driver' => 'pdo_mysql',
    'user' => 'root',
    'password' => '',
    'dbname' => 'coffeeman',
    'host' => '127.0.0.1',
];

$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

\Doctrine\DBAL\Types\Type::addType('uuid', 'Ramsey\Uuid\Doctrine\UuidType');

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
