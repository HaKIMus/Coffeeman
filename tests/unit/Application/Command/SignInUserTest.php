<?php
namespace Application\Command;


use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Doctrine\DBAL\Connection;

class SignInUserTest extends \Codeception\Test\Unit
{
    public function testSignInUserParameters()
    {
        $connection = $this->getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $userBySignInData = new GetUserBySignInData($connection);

        $signInUser = new SignInUser('Test', '123', $userBySignInData);

        $this->assertEquals('Test', $signInUser->getUsername());
        $this->assertEquals('123', $signInUser->getPassword());
        $this->assertEquals($userBySignInData, $signInUser->getUserBySignInData());
    }
}