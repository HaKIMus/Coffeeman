<?php
namespace Application\Command;


use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Doctrine\DBAL\Connection;

class SignInUserTest extends \Codeception\Test\Unit
{
    public function testSignInUserParameters()
    {
        $signInUser = new SignInUser('Test', '123');

        $this->assertEquals('Test', $signInUser->getUsername());
        $this->assertEquals('123', $signInUser->getPassword());
    }
}