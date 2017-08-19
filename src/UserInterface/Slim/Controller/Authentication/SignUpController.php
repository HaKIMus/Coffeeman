<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 19.08.17
 * Time: 17:17
 */

namespace Coffeeman\UserInterface\Slim\Controller\Authentication;

use Coffeeman\Application\Command\SignUpUser;
use Coffeeman\Application\Handler\SignUpUserHandler;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;
use Coffeeman\UserInterface\Slim\Controller\Controller;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class SignUpController extends Controller
{
    public function signUpAction(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $signUpUserCommand = new SignUpUser(
            $request->getParam('username'),
            $request->getParam('email'),
            $request->getParam('password')
        );

        $this->container->commandBus->registerHandler(SignUpUser::class, new SignUpUserHandler(new DoctrineUser($this->container->entityManager)));
        $this->container->commandBus->handle($signUpUserCommand);

        $homepageUrl = $this->container->router->pathFor('homepage');
        return $response->withStatus(200)->withHeader('Location', $homepageUrl);
    }
}
