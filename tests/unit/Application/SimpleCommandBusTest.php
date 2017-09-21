<?php
namespace Application\Handler;

use Codeception\Test\Unit;
use Coffeeman\Application\Command\CreateNewUser;
use Coffeeman\Application\Command\CreateNewWorkout;
use Coffeeman\Application\Command\SignInUser;
use Coffeeman\Application\Handler\CreateNewUserHandler;
use Coffeeman\Application\Handler\CreateNewWorkoutHandler;
use Coffeeman\Application\Handler\SignInUserHandler;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Coffeeman\Infrastructure\Domain\User\DoctrineUser;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkout;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutInformation;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;
use Tests\Unit\CoffeemanDatabase;

class SimpleCommandBusTest extends Unit
{
    private $simpleCommandBus;
    private $createNewWorkout;
    private $doctrineWorkout;

    public function __construct()
    {
        parent::__construct();

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
}
