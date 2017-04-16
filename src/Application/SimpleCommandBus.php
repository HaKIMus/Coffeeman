<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 21:36
 */

namespace Coffeeman\Application;

use Coffeeman\Application\Validation\CommandClass;

final class SimpleCommandBus implements CommandBusInterface
{
    private $handler = [];

    public function registerHandler(CommandClass $commandClass, $handler): void
    {
        $this->handler[$commandClass->getValue()] = $handler;
    }

    public function handle($command): void
    {
        $this->handler[get_class($command)]->handle($command);
    }
}