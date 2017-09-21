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
use Coffeeman\Application\Handler\SignInUserHandler;
use Coffeeman\Application\Handler\SignUpUserHandler;
use Coffeeman\Application\Service\CheckApplicationService;
use Coffeeman\Application\Service\CheckStrategy;
use Coffeeman\Application\Service\SignInUserService;
use Coffeeman\Application\Service\SumSportsmanWorkoutsApplicationService;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Container;

final class HomeController extends Controller
{
    private $check;

    public function __construct(Container $container, CheckApplicationService $check)
    {
        parent::__construct($container);

        $this->check = $check;
    }

    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->view->render($response, 'main/homepage.twig', [
            'titleWebsite' => $this->container->get('titleWebsite'),
            'isUserSignedIn' => $this->check->check(),
            'user' => $this->getUserData(),
        ]);
    }

    private function getUserData()
    {
        return isset($_SESSION['user']) ? $_SESSION['user'] : null;
    }
}
