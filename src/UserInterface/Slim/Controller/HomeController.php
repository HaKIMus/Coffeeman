<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:57
 */

declare (strict_types = 1);

namespace Coffeeman\UserInterface\Slim\Controller;

use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Application\Handler\SignInUserHandler;
use Coffeeman\Application\Service\Login\LoginService;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Service\Login\Login;
use Coffeeman\Infrastructure\Service\Dbal\GetUserBySignInData;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;
use Slim\Http\Response;

final class HomeController extends Controller
{
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'main/homepage.twig', [
            'titleWebsite' => $this->container->get('titleWebsite')
        ]);
    }

    public function signInAction(Request $request): void
    {
        $signInUserCommand = new SignInUser(
            $request->getParam('username'),
            $request->getParam('password'),
            new Connection($this->container['dbParams'], new Driver()));

        $commandBus = new SimpleCommandBus();

        $signInUserHandler = new SignInUserHandler();

        $commandBus->registerHandler($signInUserCommand, $signInUserHandler);
        $commandBus->handle($signInUserCommand);

        var_dump($signInUserHandler->getUser());
    }
}