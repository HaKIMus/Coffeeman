<?php

namespace Domain;

use Codeception\Test\Unit;
use Coffeeman\Domain\Workout\Workout;
use Coffeeman\Domain\Workout\WorkoutBurnedCalories;
use Coffeeman\Domain\Workout\WorkoutStartDate;
use Coffeeman\Domain\Workout\WorkoutStopDate;
use Coffeeman\Infrastructure\Domain\Workout\DoctrineWorkoutType;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class WorkoutTest extends Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $entityManager;

    public function __construct()
    {
        $paths = [
            __DIR__ . '/../../../src/Domain/Workout'
        ];
        $isDevMode  = true;

        $dbParams = [
            'driver' => 'pdo_mysql',
            'user' => 'root',
            'password' => '',
            'dbname' => 'coffeeman',
            'host' => '127.0.0.1',
        ];

        $config = Setup::createYAMLMetadataConfiguration($paths, $isDevMode);
        $entityManager = EntityManager::create($dbParams, $config);

        $this->entityManager = $entityManager;
    }

    public function testForWorkoutCorrectlyWorking()
    {
        $workoutType = new DoctrineWorkoutType($this->entityManager);
        $type = $workoutType->getById(1);

        $workout = new Workout(
            new WorkoutBurnedCalories(200),
            new WorkoutStartDate(new \DateTime('2017-03-27 20:30:00')),
            new WorkoutStopDate(new \DateTime()),
            $type
        );

        $this->assertNotEmpty($workout);
    }
}