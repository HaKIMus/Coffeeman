<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 15:58
 */

namespace Coffeeman\Infrastructure\Authorization;

use Coffeeman\Application\Query\User\UserView;
use Coffeeman\Infrastructure\Domain\AbstractDBALQuery;

final class GetUserBySignInData extends AbstractDBALQuery
{
    public function getUserBySignInData(string $username, string $password): array
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder->
            select('u.id',
                'u.username',
                'u.email')
                ->from('user', 'u')
                ->where('u.username = :username')
                ->andWhere('u.password = :password')
                ->setParameter('username', $username)
                ->setParameter('password', $password);

        $userData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());

        if (!$userData) {
            throw new \InvalidArgumentException('No user found.');
        }

        return $userData;
    }
}
