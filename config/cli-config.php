<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 13.02.17
 * Time: 11:13
 */
use Doctrine\ORM\Tools\Console\ConsoleRunner;


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require __DIR__ . '/../vendor/autoload.php';
$paths = array(__DIR__ . '/../src/Domain/Training');
$isDevMode = false;

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'coffeeman',
);

$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

return ConsoleRunner::createHelperSet($entityManager);