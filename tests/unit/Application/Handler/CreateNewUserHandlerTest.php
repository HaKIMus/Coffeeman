<?php
namespace Application\Handler;

use Coffeeman\Application\Command\CreateNewUser;
use Coffeeman\Application\Handler\CreateNewUserHandler;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;
use Ramsey\Uuid\Uuid;

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

        $command->method('getId')
            ->willReturn(Uuid::uuid4());
        $command->method('getUsername')
            ->willReturn('Test');

        $createNewUserHandler->handle($command);
    }
}