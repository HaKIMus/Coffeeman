<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 17:42
 */

namespace Coffeeman\Application\Service;

use Coffeeman\Application\Command\SumSportsmanWorkouts;
use Coffeeman\Application\Handler\SumSportsmanWorkoutsHandler;
use Coffeeman\Application\SimpleCommandBus;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutTypeQuery;
use Doctrine\DBAL\Connection;

final class SumSportsmanWorkoutsApplicationService
{
    private $commandBus;
    private $connection;
    private $userId;

    public function __construct(SimpleCommandBus $commandBus, Connection $connection, string $userId)
    {
        $this->commandBus = $commandBus;
        $this->connection = $connection;
        $this->userId = $userId;
    }

    public function sumSportsmanWorkouts()
    {
        $sumSportsmanWorkoutsCommand = new SumSportsmanWorkouts($this->userId);

        $this->commandBus->registerHandler(
            SumSportsmanWorkouts::class,
            new SumSportsmanWorkoutsHandler(new DbalWorkoutQuery($this->connection),
                new DbalWorkoutTypeQuery($this->connection))
        );

        $this->commandBus->handle($sumSportsmanWorkoutsCommand);
    }
}