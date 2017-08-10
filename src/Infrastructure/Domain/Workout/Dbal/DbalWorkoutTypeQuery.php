<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 07:37
 */

namespace Coffeeman\Infrastructure\Domain\Workout\Dbal;


use Coffeeman\Application\Query\Workout\WorkoutTypeView;
use Coffeeman\Application\Query\WorkoutTypeQueryInterface;
use Coffeeman\Infrastructure\Domain\AbstractDBALQuery;

class DbalWorkoutTypeQuery extends AbstractDBALQuery implements WorkoutTypeQueryInterface
{
    public function getById(int $id): WorkoutTypeView
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder
            ->select('wType.id',
                'wType.name')
            ->from('workoutType', 'wType')
            ->where('wType.id = :id')
            ->setParameter('id', $id);

        $workoutTypeData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return new WorkoutTypeView(
            $workoutTypeData['id'],
            $workoutTypeData['name']
        );
    }

    public function getAll(): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('wType.id',
                'wType.name')
            ->from('workoutType', 'wType');

        $workoutTypeData = $this->connection->fetchAll($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return array_map(function(array $workoutTypeData) {
            return new WorkoutTypeView(
                $workoutTypeData['id'],
                $workoutTypeData['name']
            );
        }, $workoutTypeData);
    }

    public function getBySportsmanIdMostPopularWorkoutType(string $sportsmanId): WorkoutTypeView
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('w.workoutInformation',
                'wInformation.id',
                'wInformation.workoutType',
                'COUNT(wType.id) AS mostPopularWorkoutType',
                'wType.id',
                'wType.name')
            ->from('workout', 'w')
            ->innerJoin('w', 'workoutInformation', 'wInformation', 'wInformation.id = w.workoutInformation')
            ->innerJoin('w', 'workoutType', 'wType', 'wType.id = wInformation.workoutType')
            ->where('w.sportsmanId = :sportsmanId')
            ->groupBy('wInformation.workoutType')
            ->orderBy('mostPopularWorkoutType', 'DESC')
            ->setMaxResults(1)
            ->setParameter('sportsmanId', $sportsmanId);

        $workoutData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return new WorkoutTypeView(
            $workoutData['id'],
            $workoutData['name']
        );
    }
}
