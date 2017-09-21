<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 10.08.17
 * Time: 17:42
 */

namespace Coffeeman\Application\Service;

use Coffeeman\Domain\SumStrategy;
use Coffeeman\Domain\Workout\Sum\SumSportsmanWorkouts;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutTypeQuery;
use Doctrine\DBAL\Connection;

final class SumSportsmanWorkoutsApplicationService
{
    private $connection;
    private $userId;
    private $summedWorkouts;

    public function __construct(Connection $connection, string $userId)
    {
        $this->connection = $connection;
        $this->userId = $userId;
    }

    public function sumSportsmanWorkouts(): void
    {
        $sumSportsmanWorkouts = new SumStrategy(new SumSportsmanWorkouts(
            new DbalWorkoutQuery($this->connection),
            new DbalWorkoutTypeQuery($this->connection),
            $this->userId
        ));

        $sumSportsmanWorkouts->sum();
        $this->summedWorkouts = $sumSportsmanWorkouts->getSummary();
    }

    public function getSummedSportsmanWorkouts(): array
    {
        return $this->summedWorkouts;
    }
}
