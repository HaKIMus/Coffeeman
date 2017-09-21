<?php
namespace Application\Handler;

use Coffeeman\Application\Command\CreateNewUser;
use Coffeeman\Application\Handler\CreateNewUserHandler;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;

class CreateNewUserHandlerTest extends \Codeception\Test\Unit
{
    public function testOfHandlingCreateNewUserCommand()
    {
        $doctrineUsers = $this->getMockBuilder(DoctrineUser::class)
            ->disableOriginalConstructor()
            ->getMock();

        $createNewUserHandler = new CreateNewUserHandler($doctrineUsers);

        $command = $this->getMockBuilder(CreateNewUser::class)
            ->disableOriginalConstructor()
            ->getMock();

        $command->method('getUsername')
            ->willReturn('Test');

        $command->method('getEmail')
            ->willReturn('Test@email.com');

        $command->method('getPassword')
            ->willReturn('Hello');

        $createNewUserHandler->handle($command);
    }
}