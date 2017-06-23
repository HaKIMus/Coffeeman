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
        $workout = $this->workoutQuery->getById(2);

        $this->assertNotEmpty($workout);
    }

    public function testGetAllWorkouts()
    {
        $workouts = $this->workoutQuery->getAll();

        $this->assertNotEmpty($workouts);
    }

    public function testGetAllWorkoutsBySportsmanId()
    {
        $sportsmanWorkouts = $this->workoutQuery->getAllWorkoutsBySportsmanId(1);
    }

    public function testGetBySportsmanIdMostPopularWorkoutType()
    {
        $mostPopularWorkoutBySportsmanId = $this->workoutQuery->getBySportsmanIdMostPopularWorkoutType(1);
        $this->assertEquals('CARDIO', $mostPopularWorkoutBySportsmanId->getWorkoutTypeName());
    }

    /**
     * @expectedException TypeError
     */
    public function testGetWorkoutByIdShouldReturnException()
    {
        $this->workoutQuery->getById(0);
    }
}
