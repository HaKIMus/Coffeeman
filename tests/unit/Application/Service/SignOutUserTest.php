<?php
namespace Application\Service;


use Coffeeman\Application\Service\SignOutUser;
use Slim\Http\Request;

class SignOutUserTest extends \Codeception\Test\Unit
{
    public function tearDown()
    {
        session_unset();

        parent::tearDown();
    }

    public function testSigningOutUserDeletingUserSessionAndSummedSportsmanWorkouts()
    {
        @session_start();
        $_SESSION['user'] = ['test', ['summedSportsmanWorkouts' => ['burnedCalories' => 600]]];

        $request = $this->getMockBuilder(Request::class)
            ->disableOriginalConstructor()
            ->getMock();

        $signOutUser = new SignOutUser();
        $signOutUser->signOut($request);

        $this->assertFalse(isset($_SESSION['user']));
        $this->assertFalse(isset($_SESSION['user']['summedSportsmanWorkouts']));
    }
}