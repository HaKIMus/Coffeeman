<?php

namespace Application\Service;

use Coffeeman\Application\Service\CheckApplicationService;
use Coffeeman\Infrastructure\Domain\Check\IsUserSignedIn;

class CheckApplicationServiceTest extends \Codeception\Test\Unit
{
    public function _after()
    {
        session_unset();
        parent::_after();
    }

    public function testCheckMethodShouldReturnFalseWhenUserIsNotSignedIn()
    {
        $checkService = new CheckApplicationService(new IsUserSignedIn());

        $this->assertFalse($checkService->check());
    }

    public function testCheckMethodShouldReturnTrueWhenUserIsSignedIn()
    {
        @session_start();
        $_SESSION['user'] = 'Test';

        $checkService = new CheckApplicationService(new IsUserSignedIn());

        $this->assertTrue($checkService->check());
    }
}