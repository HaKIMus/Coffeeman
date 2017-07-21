<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 28.06.17
 * Time: 16:57
 */

declare (strict_types = 1);

namespace Coffeeman\UserInterface\Slim\Controller;

use Coffeeman\Application\Service\Login\LoginService;
use Coffeeman\Infrastructure\Service\Login\Login;
use Coffeeman\Infrastructure\Service\Dbal\UserByLoginData;
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

    public function loginAction(Request $request): void
    {
        $loginService = new LoginService(
            $request->getParam('username'),
            $request->getParam('password'),
            new Login());

        $loginService->login(new UserByLoginData(new Connection($this->container['dbParams'], new Driver())));
    }
}