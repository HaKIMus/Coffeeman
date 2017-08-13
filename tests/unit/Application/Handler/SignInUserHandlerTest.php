<?php
namespace Application\Handler;


use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Application\Handler\SignInUserHandler;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Tests\Unit\CoffeemanDatabase;

class SignInUserHandlerTest extends \Codeception\Test\Unit
{
    public function testHandlingOfCheckingExistingOfUser()
    {
        $signInUserCommand = $this->getMockBuilder(SignInUser::class)
            ->disableOriginalConstructor()
            ->getMock();

        $connection = new Connection(CoffeemanDatabase::getDbParams(), new Driver());
        $getUserBySignInData = new GetUserBySignInData($connection);

        $signInUserCommand->method('getUsername')
            ->willReturn('Test');
        $signInUserCommand->method('getPassword')
            ->willReturn('123');

        $signInUserHandler = new SignInUserHandler($getUserBySignInData);

        $signInUserHandler->handle($signInUserCommand);
    }
}