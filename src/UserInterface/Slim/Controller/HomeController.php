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
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;

final class HomeController extends Controller
{
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'main/homepage.twig', [
            'titleWebsite' => $this->container->get('titleWebsite')
        ]);
    }

    public function signInAction(Request $request, ResponseInterface $response): ResponseInterface
    {
        $signInUserCommand = new SignInUser(
            $request->getParam('username'),
            $request->getParam('password'),
            new GetUserBySignInData(new Connection($this->container['dbParams'], new Driver())));

        $signInUserHandler = new SignInUserHandler();
        $commandBus = new SimpleCommandBus();


        $commandBus->registerHandler($signInUserCommand, $signInUserHandler);
        $commandBus->handle($signInUserCommand);

        $url = $this->container->router->pathFor('homepage');
        return $response->withStatus(200)->withHeader('Location', $url);
    }
}
