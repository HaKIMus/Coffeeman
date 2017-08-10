<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:45
 */

use Coffeeman\Application\Command\CreateNewUser;
use Coffeeman\Application\Command\CreateNewWorkout;
use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Application\Command\SignUpUser;
use Coffeeman\Application\Handler\CreateNewUserHandler;
use Coffeeman\Application\Handler\CreateNewWorkoutHandler;
use Coffeeman\Application\Handler\SignInUserHandler;
use Coffeeman\Application\Handler\SignUpUserHandler;
use Coffeeman\Application\Service\Check;
use Coffeeman\Application\Service\SignOutUser;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkout;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;
use Coffeeman\UserInterface\Slim\Controller\HomeController;
use Symfony\Component\Yaml\Yaml;

$container = $app->getContainer();
$appConfig = Yaml::parse(file_get_contents(__DIR__ . '/config/app.yml'));

$container['dbParams'] = $dbParams;

$container['entityManager'] = $entityManager;

$container['titleWebsite'] = $appConfig['extras']['titleWebsite'];

$container['view'] = function ($container) : Twig {
    $view = new Twig(__DIR__ . '/resources/views', [
        'cache' => false,
    ]);

    $view->addExtension(new TwigExtension(
        $container->router,
        $container->request->getUri()
    ));

    return $view;
};

$container['connection'] = function ($container) : Connection {
    return new Connection($container['dbParams'], new Driver());
};

$container['HomeController'] = function($container): HomeController {
    return new HomeController($container, new Check());
};

$container['commandBus'] = function () : SimpleCommandBus {
    return new SimpleCommandBus();
};

$container['SignOutUser'] = function () : SignOutUser {
    return new SignOutUser();
};