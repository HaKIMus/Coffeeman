<?php
namespace Domain\Validation;

use Coffeeman\Domain\Validation\BurnedCaloriesInteger;
use InvalidArgumentException;

class BurnedCaloriesIntegerTest extends \PHPUnit_Framework_TestCase
{
    public function testValidationShouldWorkWellWithCorrectlyValue()
    {
        $burnedCaloriesInteger = new BurnedCaloriesInteger(200);
        $this->assertEquals(200, $burnedCaloriesInteger->getValue());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidationWithValueGreaterThan2000ShouldReturnException()
    {
        new BurnedCaloriesInteger(2001);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidationWithValueLessThan50ShouldReturnException()
    {
        new BurnedCaloriesInteger(49);
    }
}
