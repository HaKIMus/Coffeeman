<?php
namespace Infrastructure\Workout\Dbal;

use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use TypeError;

class DbalWorkoutQueryTest extends \PHPUnit_Framework_TestCase
{
    protected $connection;
    private $workoutQuery;

    public function __construct()
    {
        $assets = new \Assets();
        $assets->setDbParams();

        $this->connection = new Connection($assets->getDbParams(), new Driver());
        $this->workoutQuery = new DbalWorkoutQuery($this->connection);
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
