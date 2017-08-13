<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 19.07.17
 * Time: 15:32
 */

namespace Coffeeman\Infrastructure\Domain\User\Dbal;

use Coffeeman\Application\Query\User\UserView;
use Coffeeman\Application\Query\UserQueryInterface;
use Coffeeman\Infrastructure\Domain\AbstractDBALQuery;

class DbalUserQuery extends AbstractDBALQuery implements UserQueryInterface
{
    public function getById(string $id): UserView
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder
            ->select('u.id',
                'u.username',
                'u.password',
                'u.email')
            ->from('user', 'u')
            ->where('u.id = :id')
            ->setParameter('id', $id);

        $workoutData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return new UserView(
            $workoutData['id'],
            $workoutData['username'],
            $workoutData['password'],
            $workoutData['email']
        );
    }

    public function getAll(): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('u.id',
                'u.username',
                'u.password',
                'u.email')
            ->from('user', 'u');

        $usersData = $this->connection->fetchAll($queryBuilder->getSQL(), $queryBuilder->getParameters());

        return array_map(function(array $userData) {
            return new UserView(
                $userData['id'],
                $userData['username'],
                $userData['password'],
                $userData['email']
            );
        }, $usersData);
    }
}
