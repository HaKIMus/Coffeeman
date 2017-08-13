<?php
namespace Domain\Contract\User;


use Coffeeman\Domain\Contract\User\EmailContract;

class EmailContractTest extends \Codeception\Test\Unit
{
    public function testCorrectEmailShouldReturnAEqualValue()
    {
        $emailContract = new EmailContract('test@email.com');

        $this->assertEquals('test@email.com', $emailContract->getValue());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testIncorrectEmailShouldReturnAnException()
    {
        new EmailContract('notCorrect@email');
    }
}