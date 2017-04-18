<?php
namespace Application\Handler;

use Codeception\Test\Unit;
use Coffeeman\Application\Command\CreateNewWorkout;
use Coffeeman\Application\Handler\CreateNewWorkoutHandler;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkout;

class SimpleCommandBusTest extends Unit
{
    private $simpleCommandBus;

    public function __construct()
    {
        $this->simpleCommandBus = new SimpleCommandBus();
    }

    public function testRegisterHandler()
    {
        $doctrineWorkout = $this->getMockBuilder(DoctrineWorkout::class)
            ->disableOriginalConstructor()
            ->getMock();

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

        $this->simpleCommandBus->registerHandler($createNewWorkout, new CreateNewWorkoutHandler($doctrineWorkout));
    }

    public function testHandleCreateNewWorkoutClass()
    {
        $doctrineWorkout = $this->getMockBuilder(DoctrineWorkout::class)
            ->disableOriginalConstructor()
            ->getMock();

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

        $this->simpleCommandBus->registerHandler($createNewWorkout, new CreateNewWorkoutHandler($doctrineWorkout));
        $this->simpleCommandBus->handle($createNewWorkout);
    }
}
