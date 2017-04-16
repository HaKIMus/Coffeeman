<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 28.03.17
 * Time: 23:00
 */

namespace Coffeeman\Infrastructure\Domain\Workout\Dbal;

use Coffeeman\Application\Query\WorkoutQueryInterface;
use Coffeeman\Application\Query\Workout\WorkoutView;
use Doctrine\DBAL\Connection;

class DbalWorkoutQuery implements WorkoutQueryInterface
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
                'w.workoutTypeId',
                'w.workoutPropertyId')
            ->from('workout', 'w')
            ->innerJoin('w', 'workoutType', 'wType', 'wType.id = w.workoutTypeId')
            ->innerJoin('w', 'workoutProperty', 'wProperty', 'wProperty.id = w.workoutPropertyId')
            ->where('w.id = :id')
            ->setParameter('id', $id);

        $workoutData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());
        var_dump($workoutData);
        return new WorkoutView(
            $workoutData['workoutTypeId'],
            $workoutData['workoutPropertyId']
        );
    }

    public function getAll(): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select(
                'w.workoutTypeId',
                'w.workoutPropertyId')
            ->from('workout', 'w')
            ->innerJoin('w', 'workoutType', 'wType', 'wType.id = w.workoutTypeId')
            ->innerJoin('w', 'workoutProperty', 'wProperty', 'wProperty.id = w.workoutPropertyId');

        $workoutsData = $this->connection->fetchAll($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return array_map(function(array $workoutData) {
            return new WorkoutView(
                $workoutData['workoutTypeId'],
                $workoutData['workoutPropertyId']
            );
        }, $workoutsData);
    }
}
