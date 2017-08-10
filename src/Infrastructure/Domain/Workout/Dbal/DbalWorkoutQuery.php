<?php
/**
 * Created by PhpStorm.
 * User: webdevhakim
 * Date: 28.03.17
 * Time: 23:00
 */

namespace Coffeeman\Infrastructure\Domain\Workout\Dbal;

use Coffeeman\Application\Query\Workout\WorkoutTypeView;
use Coffeeman\Application\Query\WorkoutQueryInterface;
use Coffeeman\Application\Query\Workout\WorkoutView;
use Coffeeman\Infrastructure\Domain\AbstractDBALQuery;

class DbalWorkoutQuery extends AbstractDBALQuery implements WorkoutQueryInterface
{
    public function getById(int $id): WorkoutView
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder
            ->select('w.sportsmanId',
                'w.workoutInformation',
                'wInformation.workoutBurnedCalories',
                'wInformation.workoutTime',
                'wType.id',
                'wType.name',
                'wTime.id',
                'wTime.workoutStartDate',
                'wTime.workoutStopDate')
                ->from('workout', 'w')
                ->innerJoin('w', 'workoutInformation', 'wInformation', 'wInformation.id = w.workoutInformation')
                ->innerJoin('w', 'workoutType', 'wType', 'wType.id = wInformation.workoutType')
                ->innerJoin('w', 'workoutTime', 'wTime', 'wTime.id = wInformation.workoutTime')
            ->where('w.id = :id')
            ->setParameter('id', $id);

        $workoutData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return new WorkoutView(
            $workoutData['sportsmanId'],
            $workoutData['workoutTypeId'],
            $workoutData['workoutPropertyId'],
            $workoutData['name'],
            $workoutData['workoutBurnedCalories'],
            $workoutData['workoutStartDate'],
            $workoutData['workoutStopDate']
        );
    }

    public function getAll(): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('w.sportsmanId',
                'w.workoutInformation',
                'wInformation.workoutBurnedCalories',
                'wInformation.workoutTime',
                'wType.id',
                'wType.name',
                'wTime.id',
                'wTime.workoutStartDate',
                'wTime.workoutStopDate')
            ->from('workout', 'w')
            ->innerJoin('w', 'workoutInformation', 'wInformation', 'wInformation.id = w.workoutInformation')
            ->innerJoin('w', 'workoutType', 'wType', 'wType.id = wInformation.workoutType')
            ->innerJoin('w', 'workoutTime', 'wTime', 'wTime.id = wInformation.workoutTime');
        $workoutsData = $this->connection->fetchAll($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return array_map(function(array $workoutData) {
            return new WorkoutView(
                $workoutData['sportsmanId'],
                $workoutData['workoutTypeId'],
                $workoutData['workoutPropertyId'],
                $workoutData['name'],
                $workoutData['workoutBurnedCalories'],
                $workoutData['workoutStartDate'],
                $workoutData['workoutStopDate']
            );
        }, $workoutsData);
    }

    public function getAllWorkoutsBySportsmanId(string $sportsmanId): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder
            ->select('w.sportsmanId',
                'w.workoutInformation',
                'wInformation.workoutBurnedCalories',
                'wInformation.workoutTime',
                'wType.id',
                'wType.name',
                'wTime.id',
                'wTime.workoutStartDate',
                'wTime.workoutStopDate')
                ->from('workout', 'w')
                ->innerJoin('w', 'workoutInformation', 'wInformation', 'wInformation.id = w.workoutInformation')
                ->innerJoin('w', 'workoutType', 'wType', 'wType.id = wInformation.workoutType')
                ->innerJoin('w', 'workoutTime', 'wTime', 'wTime.id = wInformation.workoutTime')
            ->where('w.sportsmanId = :sportsmanId')
            ->setParameter('sportsmanId', $sportsmanId);

        $workoutsData = $this->connection->fetchAll($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return array_map(function(array $workoutData) {
            return new WorkoutView(
                $workoutData['sportsmanId'],
                $workoutData['id'],
                $workoutData['workoutInformation'],
                $workoutData['name'],
                $workoutData['workoutBurnedCalories'],
                $workoutData['workoutStartDate'],
                $workoutData['workoutStopDate']
            );
        }, $workoutsData);
    }
}
