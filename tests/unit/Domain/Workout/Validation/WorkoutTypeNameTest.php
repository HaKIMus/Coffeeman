<?php
namespace Tests\Validation;

use Codeception\Test\Unit;
use Coffeeman\Domain\Contract\WorkoutTypeNameContract;
use InvalidArgumentException;

class WorkoutTypeNameTest extends Unit
{
    public function testValidationShouldWorkWellWithCorrectlyValue()
    {
        $workoutTypeNameContract = new WorkoutTypeNameContract('Example Workout Type');
        $this->assertEquals('Example Workout Type', $workoutTypeNameContract->getValue());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidationWithValueGreaterThan2000ShouldReturnException()
    {
        new WorkoutTypeNameContract('IT WILL BE A LONG NAME OF WORKOUT TYPE - IT SHOULD RETURN AN EXCEPTION');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testValidationWithValueLessThan50ShouldReturnException()
    {
        new WorkoutTypeNameContract('Q');
    }
}
