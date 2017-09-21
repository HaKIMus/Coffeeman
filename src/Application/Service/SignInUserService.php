<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 17.08.17
 * Time: 17:48
 */

namespace Coffeeman\Application\Service;

use Coffeeman\Infrastructure\Authorization\GetUserBySignInData;
use Slim\Container;

final class SignInUserService
{
    private $username;
    private $password;
    private $container;
    private $getUserBySignInData;

    public function __construct(string $username, string $password, Container $container, GetUserBySignInData $getUserBySignInData)
    {
        $this->username = $username;
        $this->password = $password;
        $this->container = $container;
        $this->getUserBySignInData = $getUserBySignInData;
    }

    public function signIn(): void
    {
        $this->checkUserData();

        $_SESSION['user'] = $this->getUserBySignInData->getUserBySignInData($this->username, $this->password);

        $sumSportsmanWorkoutsApplicationService = new SumSportsmanWorkoutsApplicationService($this->container->get('connection'), $_SESSION['user']['id']);
        $sumSportsmanWorkoutsApplicationService->sumSportsmanWorkouts();

        $_SESSION['user']['summedSportsmanWorkouts'] = $sumSportsmanWorkoutsApplicationService->getSummedSportsmanWorkouts();
    }

    private function checkUserData(): bool
    {
        try {
            $this->getUserBySignInData->getUserBySignInData($this->username, $this->password);
        } catch (\InvalidArgumentException $argumentException) {
            return $argumentException->getMessage();
        }

        return true;
    }
}
