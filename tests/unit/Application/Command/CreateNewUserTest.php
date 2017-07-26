<?php
namespace Application\Command;


use Coffeeman\Application\Command\CreateNewUser;
use Ramsey\Uuid\Uuid;

class CreateNewUserTest extends \Codeception\Test\Unit
{
    public function testCreatingNewUserCommand()
    {
        $uuid = Uuid::uuid4();
        $createNewUser = new CreateNewUser(
            $uuid,
            'Test',
            'test@test.com',
            '123password321'
        );

        $this->assertEquals($createNewUser->getId(), $uuid);
        $this->assertEquals($createNewUser->getUsername(), 'Test');
        $this->assertEquals($createNewUser->getEmail(), 'test@test.com');
        $this->assertEquals($createNewUser->getPassword(), '123password321');
    }
}