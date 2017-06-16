<?php
namespace Application\Command;

use Coffeeman\Application\Command\CreateNewWorkout;

class CreateNewWorkoutTest extends \PHPUnit_Framework_TestCase
{
    public function testCommandShouldSuccessfullyCreated()
    {
        $createNewWorkout = new CreateNewWorkout(
            1,
            1,
            360,
            new \DateTime('2017-03-06 20:30:11'),
            new \DateTime('2017-03-06 20:36:14')
        );

        $this->assertEquals(1, $createNewWorkout->getWorkoutTypeId());
        $this->assertEquals(360, $createNewWorkout->getBurnedCalories());
        $this->assertEquals(new \DateTime('2017-03-06 20:30:11'), $createNewWorkout->getStartDate());
        $this->assertEquals(new \DateTime('2017-03-06 20:36:14'), $createNewWorkout->getStopDate());
    }
}
