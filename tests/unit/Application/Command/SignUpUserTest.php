<?php
namespace Application\Command;


use Coffeeman\Application\Command\SignUpUser;

class SignUpUserTest extends \Codeception\Test\Unit
{
    public function testSignUpUserParameters()
    {
        $signInUser = new SignUpUser('Test', 'test@test.com', '123');

        $this->assertEquals('Test', $signInUser->getUsername());
        $this->assertEquals('test@test.com', $signInUser->getEmail());
        $this->assertEquals('123', $signInUser->getPassword());
    }
}