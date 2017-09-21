<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 19.08.17
 * Time: 17:11
 */

namespace Coffeeman\UserInterface\Slim\Controller\Authentication;

use Coffeeman\Application\Service\SignInUserService;
use Coffeeman\Infrastructure\Authorization\GetUserBySignInData;
use Coffeeman\UserInterface\Slim\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SignInController extends Controller
{
    public function signInAction(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $signInService = new SignInUserService(
            $request->getParam('username'),
            $request->getParam('password'),
            $this->container,
            new GetUserBySignInData($this->container->connection));

        $signInService->signIn();

        $homepage = $this->container->router->pathFor('homepage');
        return $response->withStatus(200)->withHeader('Location', $homepage);
    }
}
