<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 28.03.17
 * Time: 23:00
 */

namespace Coffeeman\Infrastructure\Domain\Workout\Dbal;

use Coffeeman\Application\Query\WorkoutQuery;
use Coffeeman\Application\Query\Workout\WorkoutView;
use Doctrine\DBAL\Connection;

class DbalWorkoutQuery implements WorkoutQuery
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function getById(int $id): WorkoutView
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select(
                'w.workoutBurnedCalories',
                    'w.workoutStartDate',
                    'w.workoutStopDate',
                    'w.workoutTypeId')
            ->from('workout', 'w')
            ->where('w.id = :id')
            ->setParameter('id', $id);

        $workoutData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return new WorkoutView(
            $workoutData['workoutBurnedCalories'],
            $workoutData['workoutStartDate'],
            $workoutData['workoutStopDate'],
            $workoutData['workoutTypeId']
        );
    }

    public function getAll(): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select(
                'w.workoutBurnedCalories',
                'w.workoutStartDate',
                'w.workoutStopDate',
                'w.workoutTypeId')
            ->from('workout', 'w');

        $workoutsData = $this->connection->fetchAll($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return array_map(function(array $workoutData) {
            return new WorkoutView(
                $workoutData['workoutBurnedCalories'],
                $workoutData['workoutStartDate'],
                $workoutData['workoutStopDate'],
                $workoutData['workoutTypeId']
            );
        }, $workoutsData);
    }
}
