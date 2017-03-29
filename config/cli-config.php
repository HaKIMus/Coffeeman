<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 26.03.17
 * Time: 13:23
 */

require __DIR__ . '/../vendor/autoload.php';

use Doctrine\ORM\Tools\Console\ConsoleRunner;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = [
    __DIR__ . '/../src/Domain/Workout'
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

return ConsoleRunner::createHelperSet($entityManager);
