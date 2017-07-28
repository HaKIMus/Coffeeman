<?php
namespace Application\Handler;


use Coffeeman\Application\Command\SignUpUser;
use Coffeeman\Application\Handler\SignUpUserHandler;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;

class SignUpUserHandlerTest extends \Codeception\Test\Unit
{
    public function testSomeFeature()
    {
        $command = $this->getMockBuilder(SignUpUser::class)
            ->disableOriginalConstructor()
            ->getMock();

        $doctrineUsers = $this->getMockBuilder(DoctrineUser::class)
            ->disableOriginalConstructor()
            ->getMock();

        $signUpUserHandler = new SignUpUserHandler($doctrineUsers);
        $signUpUserHandler->handle($command);
    }
}