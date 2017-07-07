<?php

/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:45
 */

declare (strict_types = 1);

use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Coffeeman\UserInterface\Slim\Controller\HomeController;
use Symfony\Component\Yaml\Yaml;

$container = $app->getContainer();
$appConfig = Yaml::parse(file_get_contents(__DIR__ . '/../app/config/app.yml'));
$container['titleWebsite'] = $appConfig['extras']['titleWebsite'];

$container['view'] = function ($container) {
    $view = new Twig(__DIR__ . '/../app/resources/views', [
        'cache' => false,
    ]);
    $view->addExtension(new TwigExtension(
        $container->router,
        $container->request->getUri()
    ));
    return $view;
};

$container['HomeController'] = function($container): HomeController {
    return new HomeController($container);
};