<?php
namespace Application\Handler;

use Coffeeman\Application\Command\CreateNewWorkout;
use Coffeeman\Application\Handler\CreateNewWorkoutHandler;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkout;
use Tests\Unit\CoffeemanDatabase;

class CreateNewWorkoutHandlerTest extends \PHPUnit_Framework_TestCase
{
    private $createNewWorkoutHandler;

    public function __construct()
    {
        $workoutDoctrine = $this->getMockBuilder(DoctrineWorkout::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->createNewWorkoutHandler = new CreateNewWorkoutHandler($workoutDoctrine, CoffeemanDatabase::getEntityManager());
    }

    public function testCreateNewWorkoutHandle()
    {
        $createNewWorkout = $this->getMockBuilder(CreateNewWorkout::class)
            ->disableOriginalConstructor()
            ->getMock();

        $createNewWorkout->method('getWorkoutTypeId')
            ->willReturn(1);
        $createNewWorkout->method('getBurnedCalories')
            ->willReturn(200);
        $createNewWorkout->method('getStartDate')
            ->willReturn(new \DateTime());
        $createNewWorkout->method('getStopDate')
            ->willReturn(new \DateTime());

        $this->createNewWorkoutHandler->handle($createNewWorkout);
    }
}
