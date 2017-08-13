<?php

use Symfony\Component\Yaml\Yaml;

session_start();

require __DIR__ . '/../vendor/autoload.php';


$appConfig = Yaml::parse(file_get_contents(__DIR__ . '/../slim/config/app.yml'));
$app = new \Slim\App($appConfig);

$container = $app->getContainer();

require __DIR__ . '/../config/cli-config.php';
require __DIR__ . '/../slim/routes.php';
require __DIR__ . '/../slim/middleware.php';
require __DIR__ . '/../slim/dependencies.php';

$app->run();
