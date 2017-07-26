<?php
namespace Infrastructure\Application\Dbal;


use Coffeeman\Application\Query\User\UserView;
use Coffeeman\Infrastructure\Application\Dbal\GetUserBySignInData;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Tests\Unit\CoffeemanDatabase;

class GetUserBySignInDataTest extends \Codeception\Test\Unit
{
    public function testGettingUserByRightData()
    {
        $connection = new Connection(CoffeemanDatabase::getDbParams(), new Driver());
        $getUserBySignInData = new GetUserBySignInData($connection);

        $user = $getUserBySignInData->getUserBySignInData('Test', '123');

        $this->assertEquals(new UserView('65e2dd25-88a4-4abc-a536-7d85c40a7674', 'Test', 'test@email.test', '123'),
                            $user);
    }
}