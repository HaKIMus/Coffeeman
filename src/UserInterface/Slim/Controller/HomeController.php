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
use Coffeeman\Application\Command\SignUpUser;
use Coffeeman\Application\Command\SumSportsmanWorkouts;
use Coffeeman\Application\Handler\SignInUserHandler;
use Coffeeman\Application\Handler\SignUpUserHandler;
use Coffeeman\Application\Handler\SumSportsmanWorkoutsHandler;
use Coffeeman\Application\Service\CheckStrategy;
use Coffeeman\Application\Service\SumSportsmanWorkoutsApplicationService;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutTypeQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Container;

final class HomeController extends Controller
{
    private $check;

    public function __construct(Container $container, CheckStrategy $check)
    {
        parent::__construct($container);

        $this->check = $check;
    }

    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'main/homepage.twig', [
            'titleWebsite' => $this->container->get('titleWebsite'),
            'isUserSignedIn' => $this->isUserSignedIn(),
            'user' => $this->setUserIfSignedIn(),
            'summedSportsmanWorkouts' => $this->setSumOfSportsmanWorkoutsIfSignedIn()
        ]);
    }

    public function signInAction(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $signInUserCommand = new SignInUser(
            $request->getParam('username'),
            $request->getParam('password')
        );

        $this->container->commandBus->registerHandler(
            SignInUser::class,
            new SignInUserHandler(
                new GetUserBySignInData(
                    new Connection($this->container['dbParams'],
                    new Driver())
                )
            )
        );

        $this->container->commandBus->handle($signInUserCommand);

        $homepageUrl = $this->container->router->pathFor('homepage');

        return $response->withStatus(200)->withHeader('Location', $homepageUrl);
    }

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

    private function sumSportsmanWorkouts(): void
    {
        $service = new SumSportsmanWorkoutsApplicationService($this->container->commandBus, $this->container->connection, $_SESSION['user']['id']);
        $service->sumSportsmanWorkouts();
    }

    private function setUserIfSignedIn(): ?array
    {
        if ($this->isUserSignedIn()) {
            return $_SESSION['user'];
        }

        return Null;
    }

    private function setSumOfSportsmanWorkoutsIfSignedIn(): ?array
    {
        if ($this->isUserSignedIn()) {
            $this->sumSportsmanWorkouts();
            return $_SESSION['summedSportsmanWorkouts'];
        }

        return Null;
    }

    private function isUserSignedIn(): bool
    {
        return $this->check->check();
    }
}
