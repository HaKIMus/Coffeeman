<?php
namespace Application\Handler;


use Coffeeman\Application\Command\SignUpUser;
use Coffeeman\Application\Handler\SignUpUserHandler;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;

class SignUpUserHandlerTest extends \Codeception\Test\Unit
{
    public function testHandling()
    {
        $command = $this->getMockBuilder(SignUpUser::class)
            ->disableOriginalConstructor()
            ->getMock();

        $command->method('getUsername')
            ->willReturn('Test');
        $command->method('getEmail')
            ->willReturn('Test@test.email');
        $command->method('getPassword')
            ->willReturn('Hello');

        $doctrineUsers = $this->getMockBuilder(DoctrineUser::class)
            ->disableOriginalConstructor()
            ->getMock();

        $signUpUserHandler = new SignUpUserHandler($doctrineUsers);
        $signUpUserHandler->handle($command);
    }
}