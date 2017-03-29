<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: webdevhakim
 * Date: 26.03.17
 * Time: 13:23
 */

require __DIR__ . '/../vendor/autoload.php';
=======
 * User: hakim
 * Date: 13.02.17
 * Time: 11:13
 */
use Doctrine\ORM\Tools\Console\ConsoleRunner;

>>>>>>> 994943ed86b3589b29b84e875488cc7a736bed25

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

<<<<<<< HEAD
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
=======
require __DIR__ . '/../vendor/autoload.php';
$paths = array(__DIR__ . '/../src/Domain/Training');
$isDevMode = false;

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => 'root',
    'password' => '',
    'dbname'   => 'coffeeman',
);
>>>>>>> 994943ed86b3589b29b84e875488cc7a736bed25

$config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
$entityManager = EntityManager::create($dbParams, $config);

<<<<<<< HEAD
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
=======
return ConsoleRunner::createHelperSet($entityManager);
>>>>>>> 994943ed86b3589b29b84e875488cc7a736bed25
