<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:45
 */

use Coffeeman\Application\Service\CheckApplicationService;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Domain\Check\IsUserSignedIn;
use Coffeeman\UserInterface\Slim\Controller\Authentication\SignInController;
use Coffeeman\UserInterface\Slim\Controller\Authentication\SignOutController;
use Coffeeman\UserInterface\Slim\Controller\Authentication\SignUpController;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Slim\Container;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Coffeeman\UserInterface\Slim\Controller\HomeController;
use Symfony\Component\Yaml\Yaml;

$container = $app->getContainer();
$appConfig = Yaml::parse(file_get_contents(__DIR__ . '/config/app.yml'));

$container['dbParams'] = $dbParams;

$container['entityManager'] = $entityManager;

$container['titleWebsite'] = $appConfig['extras']['titleWebsite'];

$container['view'] = function (Container $container) : Twig {
    $view = new Twig(__DIR__ . '/resources/views', [
        'cache' => false,
    ]);

    $view->addExtension(new TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

/*
 * Controllers
 */
$container['HomeController'] = function(Container $container): HomeController {
    return new HomeController($container, new CheckApplicationService(new IsUserSignedIn()));
};

$container['SignInController'] = function(Container $container): SignInController {
    return new SignInController($container);
};

$container['SignUpController'] = function(Container $container): SignUpController {
    return new SignUpController($container);
};

$container['SignOutController'] = function (Container $container) : SignOutController {
    return new SignOutController($container);
};

/*
 * Assets
 */
$container['connection'] = function (Container $container) : Connection {
    return new Connection($container['dbParams'], new Driver());
};

$container['commandBus'] = function () : SimpleCommandBus {
    return new SimpleCommandBus();
};

