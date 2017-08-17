<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 17.08.17
 * Time: 17:48
 */

namespace Coffeeman\Application\Service;


use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Application\Handler\SignInUserHandler;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Psr\Http\Message\ResponseInterface;
use Slim\Container;

final class SignInUserApplicationService
{
    private $username;
    private $password;
    private $container;
    private $response;

    public function __construct(string $username, string $password, ResponseInterface $response, Container $container)
    {
        $this->username = $username;
        $this->password = $password;
        $this->container = $container;
        $this->response = $response;
    }

    public function signIn(): ResponseInterface
    {
        $signInUserCommand = new SignInUser(
            $this->username,
            $this->password
        );

        $this->container->get('commandBus')->registerHandler(
            SignInUser::class,
            new SignInUserHandler(
                new GetUserBySignInData($this->container->get('connection'))
            )
        );

        $this->container->get('commandBus')->handle($signInUserCommand);

        $homepageUrl = $this->container->router->pathFor('homepage');

        return $this->response->withStatus(200)->withHeader('Location', $homepageUrl);
    }
}