<?php
namespace Application\Service;


use Coffeeman\Application\Service\SignInUserService;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Authorization\GetUserBySignInData;
use Slim\Container;
use Tests\Unit\CoffeemanDatabase;

class SignInUserApplicationServiceTest extends \Codeception\Test\Unit
{
    public function _after()
    {
        @session_unset();
        parent::_after();
    }

    public function testSignInUserByCorrectDataShouldSetTheUserSession()
    {
        @session_start();

        $container = new Container();

        $container['commandBus'] = function () {
            return new SimpleCommandBus();
        };

        $container['connection'] = function () {
            return CoffeemanDatabase::getConnection();
        };

        $signInService = new SignInUserService('Test', '123', $container, new GetUserBySignInData(CoffeemanDatabase::getConnection()));
        $signInService->signIn();

        $this->assertTrue(isset($_SESSION['user']));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSignInUserByIncorrectDataShouldReturnAnException()
    {
        $container = new Container();

        $container['commandBus'] = function () {
            return new SimpleCommandBus();
        };

        $container['connection'] = function () {
            return CoffeemanDatabase::getConnection();
        };

        $signInService = new SignInUserService('Hello', '123', $container, new GetUserBySignInData(CoffeemanDatabase::getConnection()));
        $signInService->signIn();
    }
}