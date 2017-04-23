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
    private $createNewWorkout;
    private $doctrineWorkout;

    public function __construct()
    {
        $this->simpleCommandBus = new SimpleCommandBus();
        $this->createNewWorkout = $this->getMockBuilder(CreateNewWorkout::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->createNewWorkout->method('getWorkoutTypeId')
            ->willReturn(1);
        $this->createNewWorkout->method('getBurnedCalories')
            ->willReturn(200);
        $this->createNewWorkout->method('getStartDate')
            ->willReturn(new \DateTime());
        $this->createNewWorkout->method('getStopDate')
            ->willReturn(new \DateTime());

        $this->doctrineWorkout = $this->getMockBuilder(DoctrineWorkout::class)
            ->disableOriginalConstructor()
            ->getMock();
    }

    public function testRegisterHandler()
    {
        $this->simpleCommandBus->registerHandler($this->createNewWorkout, new CreateNewWorkoutHandler($this->doctrineWorkout, \CoffeemanDatabase::getEntityManager()));
    }

    public function testHandleCreateNewWorkoutClass()
    {
        $this->simpleCommandBus->registerHandler($this->createNewWorkout, new CreateNewWorkoutHandler($this->doctrineWorkout, \CoffeemanDatabase::getEntityManager()));
        $this->simpleCommandBus->handle($this->createNewWorkout);
    }
}
