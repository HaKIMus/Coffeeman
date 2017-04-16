<?php
/**
 * Created by PhpStorm.
 * User: hakim
 * Date: 16.04.17
 * Time: 16:06
 */

namespace Coffeeman\Application;

interface CommandBus
{
    public function registerHandler(string $commandClass, $handler): void;
    public function handle($command): void;
}
