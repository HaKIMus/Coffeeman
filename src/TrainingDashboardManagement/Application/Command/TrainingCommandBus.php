<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 20:32
 */

namespace Coffeeman\TrainingDashboardManagement\Application\Command;

final class TrainingCommandBus implements CommandBus
{
    private $handlers = [];

    public function registerHandler(string $commandClass, $handler)
    {
        $this->handlers[$commandClass] = $handler;
    }

    public function handle($command)
    {
        $this->handlers[get_class($command)]->handle($command);
    }
}