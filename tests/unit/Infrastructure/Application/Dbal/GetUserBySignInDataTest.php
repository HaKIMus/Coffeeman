<?php
namespace Infrastructure\Application\Dbal;

use Coffeeman\Infrastructure\Authorization\GetUserBySignInData;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Driver\PDOMySql\Driver;
use Tests\Unit\CoffeemanDatabase;

class GetUserBySignInDataTest extends \Codeception\Test\Unit
{
    public function testGettingUserByRightData()
    {
        $expected = [
            "id" => "d6e66f53-843b-4dab-bb64-6faa91e5928e",
            "username" => "Test",
            "email" => "test@email.test",
        ];

        $connection = new Connection(CoffeemanDatabase::getDbParams(), new Driver());
        $getUserBySignInData = new GetUserBySignInData($connection);

        $actualDataOfUser = $getUserBySignInData->getUserBySignInData('Test', '123');
        $this->assertEquals($expected, $actualDataOfUser);
    }
}