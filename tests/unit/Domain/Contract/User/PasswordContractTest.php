<?php
namespace Domain\Contract\User;


use Coffeeman\Domain\Contract\User\PasswordContract;

class PasswordContractTest extends \Codeception\Test\Unit
{
    public function testCorrectPasswordShouldReturnEqualValue()
    {
        $passwordContract = new PasswordContract('Hds34SDFsa@3');
        $this->assertEquals('Hds34SDFsa@3', $passwordContract->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testTooShortPasswordShouldReturnAnException()
    {
        new PasswordContract('123');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testTooLongPasswordShouldReturnAnException()
    {
        new PasswordContract('ThatsAlongPasswordButWeak');
    }
}