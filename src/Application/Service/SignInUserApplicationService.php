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
use Slim\Http\Response;

final class SignInUserApplicationService
{
    private $username;
    private $password;
    private $container;

    public function __construct(string $username, string $password, Container $container)
    {
        $this->username = $username;
        $this->password = $password;
        $this->container = $container;
    }

    public function signIn(): self
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

        return $this;
    }

    public function andRedirectTo(string $url): Response
    {
        return (new Response)->withStatus(200)->withHeader('Location', $url);
    }
}