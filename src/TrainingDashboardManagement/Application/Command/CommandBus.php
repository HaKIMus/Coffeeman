<?php

declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 12.02.17
 * Time: 20:27
 */

namespace Coffeeman\TrainingDashboardManagement\Application\Command;

interface CommandBus
{
    public function registerHandler(string $commandClass, $handler);

    public function handle($command);
}