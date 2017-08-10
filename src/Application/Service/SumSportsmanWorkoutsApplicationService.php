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
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutQuery;
use Coffeeman\Infrastructure\Domain\Workout\Dbal\DbalWorkoutTypeQuery;
use Slim\Container;

final class SumSportsmanWorkoutsApplicationService
{
    private $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function sumSportsmanWorkouts()
    {
        $sumSportsmanWorkoutsCommand = new SumSportsmanWorkouts($_SESSION['user']['id']);

        $this->container->commandBus->registerHandler(
            SumSportsmanWorkouts::class,
            new SumSportsmanWorkoutsHandler(new DbalWorkoutQuery($this->container->connection),
                new DbalWorkoutTypeQuery($this->container->connection))
        );

        $this->container->commandBus->handle($sumSportsmanWorkoutsCommand);
    }
}