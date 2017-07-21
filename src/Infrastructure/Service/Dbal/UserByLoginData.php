<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 21.07.17
 * Time: 15:58
 */

namespace Coffeeman\Infrastructure\Service\Dbal;

use Coffeeman\Application\Query\User\UserView;
use Coffeeman\Infrastructure\Domain\AbstractDBALQuery;
use PHPUnit\Runner\Exception;

final class UserByLoginData extends AbstractDBALQuery
{
    public function getUserByLoginData(string $username, string $password): UserView
    {
        $queryBuilder = $this->connection->createQueryBuilder();

        $queryBuilder->
            select('u.id',
                'u.username',
                'u.password',
                'u.email')
                ->from('user', 'u')
                ->where('u.username = :username')
                ->andWhere('u.password = :password')
                ->setParameter('username', $username)
                ->setParameter('password', $password);

        $userData = $this->connection->fetchAssoc($queryBuilder->getSQL(), $queryBuilder->getParameters());

        if (empty($userData) || !isset($userData)) {
            throw new \InvalidArgumentException('No user founded.');
        }

        return new UserView(
            $userData['id'],
            $userData['username'],
            $userData['password'],
            $userData['email']
        );
    }
}