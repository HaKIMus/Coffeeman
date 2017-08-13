<?php
namespace Infrastructure\Workout\Dbal;

use Codeception\Test\Unit;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Tests\Unit\CoffeemanDatabase;
use TypeError;

class DbalWorkoutQueryTest extends Unit
{
    protected $connection;
    private $workoutQuery;

    public function __construct()
    {
        parent::__construct();

        $this->connection = new Connection(CoffeemanDatabase::getDbParams(), new Driver());
        $this->workoutQuery = new DbalWorkoutQuery($this->connection);
    }

    public function testGetWorkoutById()
    {
        $workout = $this->workoutQuery->getById(3);

        $this->assertNotEmpty($workout);
    }

    public function testGetAllWorkouts()
    {
        $workouts = $this->workoutQuery->getAll();

        $this->assertNotEmpty($workouts);
    }

    public function testGetAllWorkoutsBySportsmanId()
    {
        $this->workoutQuery->getAllWorkoutsBySportsmanId('d6e66f53-843b-4dab-bb64-6faa91e5928e');
    }

    /**
     * @expectedException TypeError
     */
    public function testGetWorkoutByIdShouldReturnException()
    {
        $this->workoutQuery->getById(0);
    }
}
