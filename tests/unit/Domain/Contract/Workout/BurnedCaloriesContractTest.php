<?php
namespace Tests\Domain\Contract\Workout;

use Codeception\Test\Unit;
use Coffeeman\Domain\Contract\Workout\BurnedCaloriesContract;
use InvalidArgumentException;

class BurnedCaloriesContractTest extends Unit
{
    public function testValidationShouldWorkWellWithCorrectlyValue()
    {
        $burnedCaloriesInteger = new BurnedCaloriesContract(200);
        $this->assertEquals(200, $burnedCaloriesInteger->getValue());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidationWithValueGreaterThan2000ShouldReturnException()
    {
        new BurnedCaloriesContract(2001);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidationWithValueLessThan50ShouldReturnException()
    {
        new BurnedCaloriesContract(49);
    }
}
