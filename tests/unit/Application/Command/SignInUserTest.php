<?php
namespace Application\Command;


use Coffeeman\Application\Command\SignInUser;
use Doctrine\DBAL\Connection;

class SignInUserTest extends \Codeception\Test\Unit
{
    public function testSignInUserParameters()
    {
        $connection = $this->getMockBuilder(Connection::class)
            ->disableOriginalConstructor()
            ->getMock();

        $signInUser = new SignInUser('Test', '123', $connection);

        $this->assertEquals('Test', $signInUser->getUsername());
        $this->assertEquals('123', $signInUser->getPassword());
        $this->assertEquals($connection, $signInUser->getConnection());
    }
}