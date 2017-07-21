<?php
namespace Application\Query\User;


use Coffeeman\Application\Query\User\UserView;
use Ramsey\Uuid\Uuid;

class UserViewTest extends \Codeception\Test\Unit
{
    public function testViewObject()
    {
        $uuid = Uuid::uuid4();
        $userView = new UserView(
            $uuid,
            'Test',
            'test@test.com',
            '123password321'
        );

        $this->assertEquals([
                $uuid,
                'Test',
                'test@test.com',
                '123password321'
            ], [
                $userView->getId(),
                $userView->getUsername(),
                $userView->getEmail(),
                $userView->getPassword()
            ]);
    }
}