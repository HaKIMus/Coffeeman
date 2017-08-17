<?php
namespace Application\Service;


use Coffeeman\Application\Service\SignInUserApplicationService;
use Coffeeman\Application\SimpleCommandBus;
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

        $signInService = new SignInUserApplicationService('Test', '123', $container);
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

        $signInService = new SignInUserApplicationService('Hello', '123', $container);
        $signInService->signIn();
    }
}