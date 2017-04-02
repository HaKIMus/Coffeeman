<?php
namespace Infrastructure\Workout\Dbal;

use Codeception\Test\Unit;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use TypeError;

class DbalWorkoutQueryTest extends Unit
{
    protected $connection;
    private $workoutQuery;

    public function __construct()
    {
        $this->connection = new Connection(\CoffeemanDatabase::getDbParams(), new Driver());
        $this->workoutQuery = new DbalWorkoutQuery($this->connection);

        var_dump($this->workoutQuery->getById(1));
    }

    public function testGetWorkoutById()
    {
        $workout = $this->workoutQuery->getById(1);

        $this->assertNotEmpty($workout);
    }

    public function testGetAllWorkouts()
    {
        $workouts = $this->workoutQuery->getAll();

        $this->assertNotEmpty($workouts);
    }

    /**
     * @expectedException TypeError
     */
    public function testGetWorkoutByIdShouldReturnException()
    {
        $this->workoutQuery->getById(0);
    }
}
