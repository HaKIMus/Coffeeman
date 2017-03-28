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
        $dbParams = [
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'coffeeman',
            'host' => '127.0.0.1',
        ];

        $this->connection = new Connection($dbParams, new Driver());
        $this->workoutQuery = new DbalWorkoutQuery($this->connection);
    }

    public function testGetByIdWorkout()
    {
        $workout = $this->workoutQuery->getById(1);

        $this->assertNotEmpty($workout);
    }

    /**
     * @expectedException TypeError
     */
    public function testShouldReturnException()
    {
        $this->workoutQuery->getById(0);
    }

    public function testGetAllWorkouts()
    {
        $workouts = $this->workoutQuery->getAll();

        $this->assertNotEmpty($workouts);
    }
}
